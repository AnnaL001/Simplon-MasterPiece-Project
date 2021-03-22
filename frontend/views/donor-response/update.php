<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DonorResponse */

$this->title = Yii::t('app', 'Update Donor Response: {name}', [
    'name' => $model->response_id,
]);
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Donor Responses'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->response_id, 'url' => ['view', 'id' => $model->response_id]];
//$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="donor-response-update">

    <h4 class="mb-3"><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form2', [
        'model' => $model,
    ]) ?>

</div>
