<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DonorProfile */

$this->title = Yii::t('app', 'Update Donor Profile: {name}', [
    'name' => $model->donor_profileId,
]);
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Donor Profiles'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->donor_profileId, 'url' => ['view', 'id' => $model->donor_profileId]];
//$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="donor-profile-update">

    <h4 class="mb-3"><?= Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
