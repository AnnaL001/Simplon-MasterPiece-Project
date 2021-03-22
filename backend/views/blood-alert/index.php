<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Blood Alerts');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blood-alert-index">

    <h1><?php //echo Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'CREATE BLOOD ALERT'), ['create'], ['class' => 'btn btn-outline-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'alert_id',
            [
                'label' => 'Alert',
                'format' => 'ntext',
                'attribute' => 'alert_text'
            ],
            [
               'label' => 'Blood Type',
               'attribute' => 'blood_typeId',
               'value' => 'bloodType.blood_typeName'
            ],
            [
                'label' => 'Branch',
                'attribute' => 'branch_id',
                'value' => 'branch.branch_name'
            ],
            'created_at:datetime',
            //'updated_at',
            //'created_by',
            //'updated_by',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
            
                        return  Html::a('VIEW', $url, ['class' => 'btn btn-outline-info']);
            
                    },
                    
                    'update' => function ($url, $model, $key) {
            
                        return  Html::a('UPDATE', $url, ['class' => 'btn btn-outline-warning']);
            
                    },
            
                    'delete' => function ($url, $model, $key) {
            
                        return  Html::a('DELETE', $url, ['class' => 'btn btn-outline-danger','data' => [
                            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                            'method' => 'post',
                        ],]);
            
                    }
            
                ]
        ],
        ],
    ]); ?>


</div>
