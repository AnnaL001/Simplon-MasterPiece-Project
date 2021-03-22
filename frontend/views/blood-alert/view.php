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
                   <div class="d-flex flex-row">
                        <?= Html::a(Yii::t('app', 'RESPOND'), ['/donor-response/create','id' => $model->alert_id], ['class' => 'btn btn-outline-success mb-3']) ?> 
                        <?= Html::a(Yii::t('app', 'DONATION'), ['/donation/create','id' => $model->alert_id], ['class' => 'btn btn-danger mb-3 d-block mr-0 ml-auto']) ?> 
                   </div>
                   
               </div>
           </div>
       </div>
       <div class="col-12 col-md-6">
           <div class="card shadow">
                <div class="card-body">
                    <?= Html::img('@web/img/map.jpg',['class'=>'img-map']);?> 
                </div>
            </div>
       </div>
   </div>
  
   <div class="row">
       <div class="col-12">
           <div class="card shadow px-4">
               <div class="card-body">
                    <h4 class="mb-3"> Response </h4>
                    <?php if($response == null) {?>
                        <div class="alert alert-warning text-center">
                            There is no recorded response to this alert. To respond click the "respond"
                            button above
                        </div>
                    <?php } else {?>
                    <p class="normal-text"><b> Donor: </b> <br> <?= $response->user->username ?></p>
                    <p class="normal-text"><b> Response: </b><br> <?= $response->response ?></p>
                    <?= Html::a(Yii::t('app', 'Edit'), ['/donor-response/update','id' => $response->response_id], ['class' => 'btn btn-outline-success mb-3']) ?> 
                    <?php } ?>
               </div>
           </div>
       </div>
   </div>
</div>
