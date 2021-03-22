<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Donor Profiles');
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donor-profile-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Donor Profile'), ['create'], ['class' => 'btn btn-outline-success']) ?>
    </p>

 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'donor_profileId',
            'user_id',
            'firstname',
            'middlename',
            'surname',
            //'phoneNo',
            //'gender_id',
            //'reward_points',
            //'level_id',
            //'donor_eligibility',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
