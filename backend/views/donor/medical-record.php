<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\BloodType;

/* @var $this yii\web\View */
/* @var $model common\models\MedicalRecord */
/* @var $form ActiveForm */
$blood_type = ArrayHelper::map(BloodType::find()->all(), 'blood_typeId', 'blood_typeName');
?>
<div class="medical-record">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12 col-md-6">
            <div class="card shadow">
                <div class="card-body">

                    <?php $form = ActiveForm::begin(); ?>

                        <?= $form->field($model, 'blood_typeId')->dropDownList($blood_type, ['placeholder' => 'Select Blood Type'])->label('Blood Type') ?>
                        <?= $form->field($model, 'date_of_birth') ?>
                        <?php //echo $form->field($model, 'user_id') ?>
                        <?= $form->field($model, 'weight')->label('Body weight in Kgs') ?>
                        <?= $form->field($model, 'haemoglobin_level') ?>
                        <?= $form->field($model, 'presence_of_conditions')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', ], ['prompt' => '']) ?>
                        <?= $form->field($model, 'comments') ?>
                        <?= $form->field($model, 'updated_by')->hiddenInput(['value'=>yii::$app->user->id])->label(false) ?>
                        <?php //echo $form->field($model, 'can_donate') ?>
                        
                    
                        <div class="form-group d-flex flex-row">
                            <?= Html::a(Yii::t('app', 'BACK'), ['/donor/view','id' => $model->user_id], ['class' => 'btn btn-outline-success']) ?>
                            <?= Html::submitButton(Yii::t('app', 'SAVE'), ['class' => 'btn btn-danger d-block mr-0 ml-auto']) ?>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div><!-- medical-record -->
