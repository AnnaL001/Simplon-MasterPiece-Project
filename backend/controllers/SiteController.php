<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\LoginForm;
use common\models\Donation;
use common\models\User;
use common\models\Branch;
use common\models\MedicalRecord;
use yii\data\ActiveDataProvider;
use yii\web\ForbiddenHttpException;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    { 
       if(Yii::$app->user->can('backend-login')){
        $donations = Donation::find()->where(['verification' => 'Yes'])->count();
        $donors = User::find()->where(['role_id' => 3])->count();
        $hospital_branches = Branch::find()->count();
        $blood_pints = Donation::find()->innerJoin('blood_quantity','blood_quantity.quantity_id =
        donation.quantity_id')->sum('quantityInPints');
        $dataProvider = new ActiveDataProvider([
            'query' => MedicalRecord::find()->groupBy('blood_typeId'),
            'pagination' => false
        ]);
        return $this->render('index',[
            'donations' => $donations,
            'donors' => $donors,
            'hospital_branches' => $hospital_branches,
            'blood_pints' => $blood_pints,
            'dataProvider' => $dataProvider
        ]);
       } else {
           throw new ForbiddenHttpException(Yii::t('app', 'You do not have sufficient priviledges.'));
       }
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
                return $this->goHome();
        }

        $this->layout = 'blank';
        
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';
                
            return $this->render('login', [
                'model' => $model,
            ]);
        }
        
            
            
        
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
