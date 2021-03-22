<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DonorResponse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="donor-response-form">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12 col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'user_id')->hiddenInput(['value'=>yii::$app->user->id])->label(false) ?>

                    <?= $form->field($model, 'alert_id')->hiddenInput(['value'=>$model->alert_id])->label(false) ?> 

                    <?= $form->field($model, 'response')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', ], ['prompt' => '']) ?>

                    <div class="form-group d-flex flex-row">
                        <?= Html::a(Yii::t('app', 'Back'), ['/blood-alert/index'], ['class' => 'btn btn-outline-success']) ?>
                        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-danger d-block mr-0 ml-auto']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
