<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Blood Alerts');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blood-alert-index">

    <h4 class="mb-3"><?php echo Html::encode($this->title) ?></h4>

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
                'template' => '{view}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
            
                        return  Html::a('View', $url, ['class' => 'btn btn-outline-info']);
            
                    },
            
                ]
        ],
        ],
    ]); ?>


</div>
