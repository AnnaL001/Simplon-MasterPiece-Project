<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AdminProfile */

$this->title = Yii::t('app', 'Update Admin Profile: {name}', [
    'name' => $model->admin_profileId,
]);
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Admin Profiles'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->admin_profileId, 'url' => ['view', 'id' => $model->admin_profileId]];
//$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="admin-profile-update">

    <h4><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
