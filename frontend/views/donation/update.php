<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Donation */

$this->title = Yii::t('app', 'Update Donation: {name}', [
    'name' => $model->donation_id,
]);
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Donations'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->donation_id, 'url' => ['view', 'id' => $model->donation_id]];
//$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="donation-update">

    <h4 class="mb-3"><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form2', [
        'model' => $model,
    ]) ?>

</div>
