<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Donation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="donation-form">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12 col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'user_id')->hiddenInput(['value'=>$model->user_id])->label(false) ?>

                    <?= $form->field($model, 'alert_id')->hiddenInput(['value'=>$model->alert_id])->label(false) ?>

                    <?php echo $form->field($model, 'quantity_id')->hiddenInput(['value'=>$model->quantity_id])->label(false) ?>

                    <?= $form->field($model, 'verification')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', ], ['prompt' => '']) ?>

                    <?= $form->field($model, 'verified_by')->hiddenInput(['value'=>Yii::$app->user->id])->label(false) ?>

                    <?php //echo $form->field($model, 'created_at')->textInput() ?>

                    <?php //echo $form->field($model, 'updated_at')->textInput() ?>

                    <div class="form-group d-flex flex-row">
                        <?= Html::a(Yii::t('app', 'BACK'), ['/donation/index'], ['class' => 'btn btn-outline-success']) ?>
                        <?= Html::submitButton(Yii::t('app', 'SAVE'), ['class' => 'btn btn-danger d-block mr-0 ml-auto']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
