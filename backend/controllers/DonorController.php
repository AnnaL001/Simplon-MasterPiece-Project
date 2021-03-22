<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use common\models\DonorProfile;
use common\models\MedicalRecord;
use common\models\DonationHistory;
use common\models\Donation;
use backend\models\SignupForm2;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\VerbFilter;

/**
 * DonorController implements the CRUD actions for User model.
 */
class DonorController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect(['/site/login']);
        } else {
            if(Yii::$app->user->can('read-donor')){
                $query = User::find()->where(['role_id' => 3]);
                $dataProvider = new ActiveDataProvider([
                    'query' => User::find()->innerJoin('auth_assignment', 'id = auth_assignment.user_id')
                    ->where(['item_name' => 'Blood donor']) ,
                    'pagination' => [
                        'pageSize' => 10,
                    ],
                ]);
        
                return $this->render('index', [
                    'dataProvider' => $dataProvider,
                ]);
            } else {
                throw new ForbiddenHttpException(Yii::t('app', 'You do not have sufficient priviledges.'));
            }
        }
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect(['/site/login']);
        } else {
            if(Yii::$app->user->can('read-donor')){
                $profile = DonorProfile::find()->where(['user_id' => $id])->one();
                $record = MedicalRecord::find()->where(['user_id' => $id])->one();
                return $this->render('view', [
                    'model' => $this->findModel($id),
                    'profile' => $profile,
                    'record' => $record
                ]);
            } else {
                throw new ForbiddenHttpException(Yii::t('app', 'You do not have sufficient priviledges.'));
            }
        }
    }

    public function actionDonationHistory($id)
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect(['/site/login']);
        } else {
            if(Yii::$app->user->can('view-donation-history')){
                $query = Donation::find()
                ->where(['verification' => 'Yes'])
                ->andWhere(['user_id' => $id])
                ->orderBy('created_at DESC');
                $model = User::findOne([
                    'id' => $id
                ]);
                $dataProvider = new ActiveDataProvider([
                    'query' => $query,
                    'pagination' => [
                        'pageSize' => 5,
                    ],
                ]);

                return $this->render('donation-history',[
                    'dataProvider' => $dataProvider,
                    'model' => $model
                ]);
            } else {
                throw new ForbiddenHttpException(Yii::t('app', 'You do not have sufficient priviledges.'));
            }
        }
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect(['/site/login']);
        } else{
            if(Yii::$app->user->can('create-donor')){
                $model = new SignupForm2();

                if ($model->load(Yii::$app->request->post()) && $model->signup()) {
                    return $this->redirect(['index']);
                }

                return $this->render('create', [
                    'model' => $model,
                ]);

            } else {
                throw new ForbiddenHttpException(Yii::t('app', 'You do not have sufficient priviledges.'));
            }
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionProfile($id)
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect(['/site/login']);
        } else {
            if(Yii::$app->user->can('update-donor-profile')){
                $model =  $this->findProfile($id);

                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    return $this->redirect(['view', 'id' => $model->user_id]);
                }

                return $this->render('profile', [
                    'model' => $model,
                ]);
            } else {
                throw new ForbiddenHttpException(Yii::t('app', 'You do not have sufficient priviledges.'));
            }
        }
        
    }   

    public function actionMedicalRecord($id)
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect(['/site/login']);
        } else {
            if(Yii::$app->user->can('update-medical-record')){
                $model =  $this->findMedicalRecord($id);

                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    return $this->redirect(['view', 'id' => $model->user_id]);
                }

                return $this->render('medical-record', [
                    'model' => $model,
                ]);
            } else {
                throw new ForbiddenHttpException(Yii::t('app', 'You do not have sufficient priviledges.'));
            }
        }
    }

    /**
     * Deletes an existing User model.
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
            if(Yii::$app->user->can('delete-donor')){
                $this->findModel($id)->delete();
                return $this->redirect(['index']);
            } else {
                throw new ForbiddenHttpException(Yii::t('app', 'You do not have sufficient priviledges.'));
            }
        }
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    /**
     * Finds the DonorProfile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DonorProfile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findProfile($id)
    {
        if (($model = DonorProfile::findOne(['user_id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    /**
     * Finds the MedicalRecord model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MedicalRecord the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findMedicalRecord($id)
    {
        if (($model = MedicalRecord::findOne(['user_id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    /**
     * Finds the History model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return History the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findDonation($id)
    {
        if (($model = DonationHistory::findAll(['donation_id' => Donation::findAll(['user_id' => $id])])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
