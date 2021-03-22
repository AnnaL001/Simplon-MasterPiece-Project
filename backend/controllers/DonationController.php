<?php

namespace backend\controllers;

use Yii;
use common\models\Donation;
use common\models\BloodAlert;
use common\models\AdminProfile;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;

/**
 * DonationController implements the CRUD actions for Donation model.
 */
class DonationController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Donation models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect(['/site/login']);
        } else {
        if(Yii::$app->user->can('read-donation')){
            $admin_profile = AdminProfile::findOne(['user_id' => Yii::$app->user->id]);
            $donation = Donation::find()->innerJoinWith('alert')->where(
                ['blood_alert.branch_id' => $admin_profile->branch_id])->andWhere([
                    'donation.verification' => 'No'
                ]);
            $dataProvider = new ActiveDataProvider([
                'query' => $donation,
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]);

            return $this->render('index', [
                'dataProvider' => $dataProvider,
            ]);
        } elseif(Yii::$app->user->can('read-all-donations')){
            $donation = Donation::find()->innerJoinWith('alert')->where([
                    'donation.verification' => 'No'
                ]);
            $dataProvider = new ActiveDataProvider([
                'query' => $donation,
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]);

            return $this->render('index', [
                'dataProvider' => $dataProvider,
            ]);
        } else{
            throw new ForbiddenHttpException(Yii::t('app', 'You do not have sufficient priviledges.'));
        }
        }
        
    }

    /**
     * Displays a single Donation model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect(['/site/login']);
        } else {
            if(Yii::$app->user->can('read-donation') or Yii::$app->user->can('read-all-donations')){
                return $this->render('view', [
                    'model' => $this->findModel($id),
                ]);
            } else {
                throw new ForbiddenHttpException(Yii::t('app', 'You do not have sufficient priviledges.'));
            }
        }        
    }

    /**
     * Updates an existing Donation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect(['/site/login']);
        } else {
            if(Yii::$app->user->can('update-donation')){
                $model = $this->findModel($id);

                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    return $this->redirect(['index']);
                }

                return $this->render('update', [
                    'model' => $model,
                ]);
            } else{
                throw new ForbiddenHttpException(Yii::t('app', 'You do not have sufficient priviledges.'));
            }
        }
        
    }

    /**
     * Deletes an existing Donation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect(['/site/login']);
        } else {
            if(Yii::$app->user->can('delete-donation')){
                $this->findModel($id)->delete();

                return $this->redirect(['index']);
            } else {
                throw new ForbiddenHttpException(Yii::t('app', 'You do not have sufficient priviledges.'));
            }
        }
        
    }

    /**
     * Finds the Donation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Donation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Donation::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
