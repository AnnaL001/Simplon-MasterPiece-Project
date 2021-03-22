<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BloodAlert */

$this->title = Yii::t('app', 'Create Blood Alert');
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Blood Alerts'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blood-alert-create">

    <h4 class="mb-3"><?php echo Html::encode($this->title) ?></h4>

    <?= $this->render('_form', [
        'model' => $model,
        'profile' => $profile
    ]) ?>
    
</div>
