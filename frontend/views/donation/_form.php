<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\BloodQuantity;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\Donation */
/* @var $form yii\widgets\ActiveForm */
$quantity = ArrayHelper::map(BloodQuantity::find()->all(), 'quantity_id', 'quantityInPints');

?>

<div class="donation-form">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12 col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'user_id')->hiddenInput(['value'=>yii::$app->user->id])->label(false) ?>

                    <?= $form->field($model, 'alert_id')->hiddenInput(['value'=> $alert->alert_id])->label(false) ?>

                    <?= $form->field($model, 'quantity_id')->dropDownList($quantity, ['placeholder' => 'Select Quantity'])->label('Blood quantity') ?>

                    <?php //echo $form->field($model, 'verification')->textInput(['maxlength' => true]) ?>

                    <?php //echo $form->field($model, 'verified_by')->textInput() ?>

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
