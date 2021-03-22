<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Branch */

//$this->title = $model->branch_id;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Branches'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="branch-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= Html::a(Yii::t('app', 'BACK'), ['/branch/index'], ['class' => 'btn btn-outline-success mb-3']) ?>
    <div class="card shadow">
        <div class="card-body p-4">
            <div class="row">
                <div class="col-12 col-md-3">
                    <?= Html::img('@web/../img/hospital.png',['class'=>'img-fluid']);?>
                </div>
                <div class="col-12 col-md-9">
                        <p class="mt-3 normal-text"> <b> Branch Name: </b> <br> <?= $model->branch_name ?> </p>
                        <p class="normal-text"> <b>Branch Description: </b> <br><?= $model->branch_desc ?> </p>
                        <p class="normal-text"> <b>Branch Location:</b> <br> <?= $model->location->location_name ?> </p>
                </div>
            </div>    
        </div>
    </div>

    <!--<p> -->
        <?php //echo Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->branch_id], ['class' => 'btn btn-primary']) ?>
        <?php //echo Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->branch_id], [
            //'class' => 'btn btn-danger',
            //'data' => [
                //'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
               // 'method' => 'post',
            //],
       // ]) ?>
   <!-- </p> -->
    
                    <?php /*echo DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            //'branch_id',
                            'branch_name',
                            [
                            'label' => 'Branch Description',
                            'attribute' =>'branch_desc',
                            ],
                            [
                                'label' => 'Branch Location',
                                'attribute' => 'location_id',
                                'value' => $model->location->location_name
                            ],
                        ],
                    ]) */?>
</div>
