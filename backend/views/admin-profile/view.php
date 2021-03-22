<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\AdminProfile */

//$this->title = $model->admin_profileId;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Admin Profiles'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="admin-profile-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->admin_profileId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->admin_profileId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'admin_profileId',
            'user_id',
            'firstname',
            'middlename',
            'surname',
            'phoneNo',
            'branch_id',
            'gender_id',
            'hospital_roleId',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
