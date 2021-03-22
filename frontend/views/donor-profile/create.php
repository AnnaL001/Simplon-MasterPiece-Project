<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DonorProfile */

$this->title = Yii::t('app', 'Create Donor Profile');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Donor Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donor-profile-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
