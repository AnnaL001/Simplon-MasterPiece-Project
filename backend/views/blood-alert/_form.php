<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\BloodType;
use common\models\Branch;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\BloodAlert */
/* @var $form yii\widgets\ActiveForm */
$blood_type = ArrayHelper::map(BloodType::find()->all(), 'blood_typeId', 'blood_typeName');
$branch = ArrayHelper::map(Branch::find()->all(), 'branch_id', 'branch_name');
?>

<div class="blood-alert-form">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12 col-md-6">
            <div class="card shadow">
                <div class="card-body">

                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'alert_text')->textarea(['rows' => 6])->label('Alert') ?>

                    <?= $form->field($model, 'blood_typeId')->dropDownList($blood_type, ['placeholder' => 'Select Blood Type'])->label('Blood Type') ?>
                    
                    <?php if(Yii::$app->user->can('create-alert') or Yii::$app->user->can('edit-alert') ){ ?>
                    <?= $form->field($model, 'branch_id')->hiddenInput(['value'=>$profile->branch_id])->label(false) ?>
                    <?php } elseif(Yii::$app->user->can('create-all-alerts') or Yii::$app->user->can('edit-all-alerts') ){ ?>
                        <?= $form->field($model, 'branch_id')->dropDownList($branch, ['placeholder' => 'Select Branch'])->label('Branch') ?> 
                    <?php } ?>
                    <?php //echo $form->field($model, 'created_at')->textInput() ?>

                    <?php //echo $form->field($model, 'updated_at')->textInput() ?>

                    <?= $form->field($model, 'created_by')->hiddenInput(['value'=>yii::$app->user->id])->label(false) ?>

                    <?= $form->field($model, 'updated_by')->hiddenInput(['value'=>yii::$app->user->id])->label(false) ?>

                    <div class="form-group d-flex flex-row">
                        <?= Html::a(Yii::t('app', 'BACK'), ['/blood-alert/index'], ['class' => 'btn btn-outline-success']) ?>
                        <?= Html::submitButton(Yii::t('app', 'SAVE'), ['class' => 'btn btn-danger d-block mr-0 ml-auto']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>  
</div>
