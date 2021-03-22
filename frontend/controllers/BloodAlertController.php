<?php

namespace frontend\controllers;
use Yii;
use common\models\BloodAlert;
use common\models\DonorResponse;
use common\models\MedicalRecord;
use common\models\DonorProfile;
use common\models\Branch;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\web\Controller;

class BloodAlertController extends Controller
{
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/site/login']);
        } else {
            if(Yii::$app->user->can('read-alert')){
                $donor_profile = DonorProfile::findOne(['user_id' => Yii::$app->user->id,
                'donor_eligibility' => 1]);
                if($donor_profile == null){
                    return $this->render('error');
                }else{  
                    $medical_record = MedicalRecord::findOne([
                        'user_id' => $donor_profile->user_id,
                        'blood_compatibility' => 1]);
                    if($medical_record == null){
                        return $this->render('no_alert');
                    }else{
                        $branch = Branch::findOne(['location_id' => $donor_profile->location_id]);
                        $query = BloodAlert::find()
                        ->where(['validity' => 1])
                        ->andWhere(['blood_typeId' => $medical_record->blood_typeId])
                        ->andWhere(['branch_id' => $branch->branch_id]);
                        $dataProvider = new ActiveDataProvider([
                            'query' => $query,
                            'pagination' => [
                                'pageSize' => 10,
                            ],
                        ]);
            
                        return $this->render('index', [
                            'dataProvider' => $dataProvider,
                        ]);
                    }
                }
            } else {
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
        
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['/site/login']);
        } else {
            if(Yii::$app->user->can('read-alert')){
                $response = DonorResponse::findOne(['alert_id' => $id, 'user_id' => Yii::$app->user->id]);
            return $this->render('view', [
                'model' => $this->findModel($id),
                'response' => $response
            ]);
            } else {
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
