<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BloodAlert */

$this->title = Yii::t('app', 'Update Blood Alert: {name}', [
   'name' => $model->alert_id,
]);
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blood Alerts'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->alert_id, 'url' => ['view', 'id' => $model->alert_id]];
//$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="blood-alert-update">

    <h4 class="mb-3"><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
        'profile' => $profile
    ]) ?>

</div>
