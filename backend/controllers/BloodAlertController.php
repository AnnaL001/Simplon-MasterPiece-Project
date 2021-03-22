<?php

namespace backend\controllers;

use Yii;
use common\models\BloodAlert;
use common\models\DonorResponse;
use common\models\DonorProfile;
use common\models\AdminProfile;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * BloodAlertController implements the CRUD actions for BloodAlert model.
 */
class BloodAlertController extends Controller
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
     * Lists all BloodAlert models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect(['/site/login']);
        } else {
            if(Yii::$app->user->can('read-alert')){
                $profile = AdminProfile::findOne([
                    'user_id' => Yii::$app->user->id
                ]);
                $query = BloodAlert::find()->where(['branch_id' => $profile->branch_id])->andWhere([
                'validity' => 1
                ]);
                $dataProvider = new ActiveDataProvider([
                    'query' => $query,
                ]);
        
                return $this->render('index', [
                    'dataProvider' => $dataProvider,
                ]);
            }elseif(Yii::$app->user->can('read-all-alerts')){
                $query = BloodAlert::find()->where([
                'validity' => 1
                ]);
                $dataProvider = new ActiveDataProvider([
                    'query' => $query,
                ]);
        
                return $this->render('index', [
                    'dataProvider' => $dataProvider,
                ]);
            }else{
                throw new ForbiddenHttpException(Yii::t('app', 'You do not have sufficient priviledges.'));
            }
        }        
    }

    /**
     * Displays a single BloodAlert model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect(['/site/login']);
        } else {
            if(Yii::$app->user->can('read-alert') or Yii::$app->user->can('read-all-alerts')){
                $query = DonorResponse::find()->where(['alert_id' => $id]);
                $dataProvider = new ActiveDataProvider([
                    'query' => $query,
                    'pagination' => [
                        'pageSize' => 10,
                    ],
                ]);
                return $this->render('view', [
                    'model' => $this->findModel($id),
                    'dataProvider' => $dataProvider,
                ]);
            }else{
                throw new ForbiddenHttpException(Yii::t('app', 'You do not have sufficient priviledges.'));
            }
        }
    }

    /**
     * Creates a new BloodAlert model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect(['/site/login']);
        } else {
            if((Yii::$app->user->can('create-alert')) or (Yii::$app->user->can('create-all-alerts'))){
                $model = new BloodAlert();
    
                $profile = AdminProfile::findOne([
                    'user_id' => Yii::$app->user->id
                ]);
    
                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    return $this->redirect(['view', 'id' => $model->alert_id]);
                }
    
                return $this->render('create', [
                    'model' => $model,
                    'profile' => $profile
                ]);
            } else {
                throw new ForbiddenHttpException(Yii::t('app', 'You do not have sufficient priviledges.'));
            }
        }
    }

    /**
     * Updates an existing BloodAlert model.
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
            if(Yii::$app->user->can('update-alert') or Yii::$app->user->can('update-all-alerts')){
                $model = $this->findModel($id);
    
                $profile = AdminProfile::findOne([
                    'user_id' => Yii::$app->user->id
                ]);
    
                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    return $this->redirect(['view', 'id' => $model->alert_id]);
                }
    
                return $this->render('update', [
                    'model' => $model,
                    'profile' => $profile
                ]);
            }else{
                throw new ForbiddenHttpException(Yii::t('app', 'You do not have sufficient priviledges.'));
            }
            
        }
    }

    /**
     * Deletes an existing BloodAlert model.
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
            if(Yii::$app->user->can('delete-alert')){
                $this->findModel($id)->delete();
    
                return $this->redirect(['index']);
            }else{
                throw new ForbiddenHttpException(Yii::t('app', 'You do not have sufficient priviledges.'));
            }
            
        }
        
    }

    /**
     * Finds the BloodAlert model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BloodAlert the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BloodAlert::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
