<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Branches');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branch-index">

    <h1><?php //echo Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'CREATE BRANCH'), ['create'], ['class' => 'btn btn-outline-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'branch_id',
            'branch_name',
            [
                'label' => 'Branch Description',
                'attribute' => 'branch_desc'
            ],
            [
                'label' => 'Branch Location',
                'attribute' => 'location_id',
                'value' => 'location.location_name'
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
            
                        return  Html::a(Yii::t('app', 'VIEW'), $url, ['class' => 'btn btn-outline-info']);
            
                    },

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
