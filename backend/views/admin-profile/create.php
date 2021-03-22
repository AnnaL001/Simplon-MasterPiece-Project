<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AdminProfile */

$this->title = Yii::t('app', 'Create Admin Profile');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Admin Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-profile-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
