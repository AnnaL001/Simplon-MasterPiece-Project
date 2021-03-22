<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Location;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Branch */
/* @var $form yii\widgets\ActiveForm */
$location = ArrayHelper::map(Location::find()->all(), 'location_id', 'location_name');
?>

<div class="branch-form">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12 col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'branch_name')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'branch_desc')->textarea(['rows' => 6])->label('Branch Description') ?>

                    <?= $form->field($model, 'location_id')->dropDownList($location, ['placeholder' => 'Select Location'])->label('Branch Location') ?> 

                    <div class="form-group d-flex flex-row">
                        <?= Html::a(Yii::t('app', 'BACK'), ['/branch/index'], ['class' => 'btn btn-outline-success']) ?>
                        <?= Html::submitButton(Yii::t('app', 'SAVE'), ['class' => 'btn btn-danger d-block mr-0 ml-auto']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
