<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model common\models\BloodAlert */

//$this->title = $model->alert_id;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blood Alerts'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="blood-alert-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::a(Yii::t('app', 'BACK'), ['/blood-alert/index'], ['class' => 'btn btn-outline-success mb-3']) ?> 
   <!-- <p> -->
        <?php //echo Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->alert_id], ['class' => 'btn btn-primary']) ?>
        <?php /*echo Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->alert_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) */ ?> 
    <!-- </p> -->
   <div class="row mb-5">
       <div class="col-12 col-md-6">
           <div class="card shadow">
               <div class="card-body my-3 px-5">
                   <h4 class="mb-3"> ALERT!!! </h4>
                   <p class="mb-3 normal-text"> Date: <?= $model->created_at ?> </p>
                   <p class="normal-text"> <?= $model->alert_text ?> </p>
               </div>
           </div>
       </div>
       <div class="col-12 col-md-6">
           <div class="card shadow">
                <div class="card-body">
                    <?= Html::img('@web/../img/map.jpg',['class'=>'img-map']);?> 
                </div>
            </div>
       </div>
   </div>
  
   <div class="row">
       <div class="col-12">
           <div class="card shadow px-4">
               <div class="card-body">
               <h4 class="mb-3"> Responses </h4>
               <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        //'response_id',
                        [
                            'label' => 'Donor',
                            'attribute' => 'user_id',
                            'value' => 'user.username'
                        ],
                        [
                            'label' => 'Response',
                            'attribute' => 'response',
                        ],
                        'created_at:datetime',
                        'updated_at:datetime',
                        //'created_by',
                        //'updated_by',

                        ['class' => 'yii\grid\ActionColumn']
                    ]
                ]); ?>

               </div>
           </div>
       </div>
   </div>
</div>
