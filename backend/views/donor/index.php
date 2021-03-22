<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?php //echo Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'CREATE DONOR'), ['create'], ['class' => 'btn btn-outline-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'username',
           // 'auth_key',
            //'password_hash',
           // 'password_reset_token',
            'email:email',
            //'status',
            'created_at:datetime',
            //'updated_at:datetime',
            //'verification_token',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {delete}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
            
                        return  Html::a('VIEW', $url, ['class' => 'btn btn-outline-info']);
            
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
