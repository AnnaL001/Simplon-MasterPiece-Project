<?php

namespace backend\controllers;

use Yii;
use common\models\Branch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;
/**
 * BranchController implements the CRUD actions for Branch model.
 */
class BranchController extends Controller
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
     * Lists all Branch models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect(['/site/login']);
        } else {
            if(Yii::$app->user->can('read-branch')){
                $dataProvider = new ActiveDataProvider([
                    'query' => Branch::find()->where(['<>', 'branch_name','Not yet stated']),
                    'pagination' => [
                        'pageSize' => 5,
                    ],
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
     * Displays a single Branch model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect(['/site/login']);
        } else {
            if(Yii::$app->user->can('read-branch')){
                return $this->render('view', [
                    'model' => $this->findModel($id),
                ]);
            }else{
                throw new ForbiddenHttpException(Yii::t('app', 'You do not have sufficient priviledges.'));
            }
        }
    }

    /**
     * Creates a new Branch model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect(['/site/login']);
        } else {
            if(Yii::$app->user->can('create-branch')){
                $model = new Branch();
    
                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    return $this->redirect(['view', 'id' => $model->branch_id]);
                }
    
                return $this->render('create', [
                    'model' => $model,
                ]);
            } else{
                throw new ForbiddenHttpException(Yii::t('app', 'You do not have sufficient priviledges.'));
            }
        }
        
    }

    /**
     * Updates an existing Branch model.
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
            if(Yii::$app->user->can('update-branch')){
                $model = $this->findModel($id);
    
                if ($model->load(Yii::$app->request->post()) && $model->save()) {
                    return $this->redirect(['view', 'id' => $model->branch_id]);
                }
    
                return $this->render('update', [
                    'model' => $model,
                ]);
            } else {
                throw new ForbiddenHttpException(Yii::t('app', 'You do not have sufficient priviledges.'));
            }
        }   
    }

    /**
     * Deletes an existing Branch model.
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
            if(Yii::$app->user->can('delete-branch')){
                $this->findModel($id)->delete();
    
                return $this->redirect(['index']);
            }else{
                throw new ForbiddenHttpException(Yii::t('app', 'You do not have sufficient priviledges.'));
            }
        }
        
    }

    /**
     * Finds the Branch model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Branch the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Branch::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
