<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Donation */

$this->title = Yii::t('app', 'Create Donation');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Donations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donation-create">

    <h4 class="mb-3"><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
        'alert' => $alert
    ]) ?>

</div>
