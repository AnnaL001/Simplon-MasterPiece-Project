<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DonorResponse */

$this->title = Yii::t('app', 'Create Donor Response');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Donor Responses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donor-response-create">

    <h4 class="mb-3"><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
        'alert' => $alert
    ]) ?>

</div>
