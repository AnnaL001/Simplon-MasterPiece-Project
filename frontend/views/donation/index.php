<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Donations');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donation-index">

    <h4 class="mb-3 normal-text"><?= Html::encode($this->title) ?></h4>

    <p>
        <?php //echo Html::a(Yii::t('app', 'Create Donation'), ['create'], ['class' => 'btn btn-outline-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'donation_id',
            [
                'label' => 'Donor',
                'attribute' => 'user_id',
                'value' => 'user.username'
            ],
            [
                'label' => 'Alert',
                'attribute' => 'alert_id',
                'value' => 'alert.alert_text'
            ],
            [
                'label' => 'Quantity in pints',
                'attribute' => 'quantity_id',
                'value' => 'quantity.quantityInPints'
            ],
            'verification',
            //'verified_by',
            //'created_at',
            //'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function ($url, $model, $key) {
            
                        return  Html::a(Yii::t('app', 'UPDATE'), $url, ['class' => 'btn btn-outline-warning']);
            
                    },
            
                    'delete' => function ($url, $model, $key) {
            
                        return  Html::a(Yii::t('app', 'DELETE'), $url, ['class' => 'btn btn-outline-danger','data' => [
                            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                            'method' => 'post',
                        ],]);
            
                    }
            
                ]
            ],
        ],
    ]); ?>


</div>
