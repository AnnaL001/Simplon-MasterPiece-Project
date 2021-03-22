<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Branch;
use common\models\Gender;
use common\models\HospitalRole;

/* @var $this yii\web\View */
/* @var $model common\models\AdminProfile */
/* @var $form yii\widgets\ActiveForm */
$gender = ArrayHelper::map(Gender::find()->all(), 'gender_id', 'gender_name');
$branch = ArrayHelper::map(Branch::find()->all(), 'branch_id', 'branch_name');
$hospital_role = ArrayHelper::map(HospitalRole::find()->all(), 'hospital_roleId', 'hospital_role');
?>

<div class="admin-profile-form">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12 col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <?php $form = ActiveForm::begin(); ?>

                    <?php //echo $form->field($model, 'user_id') ?> 

                    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'middlename')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'phoneNo')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'branch_id')->dropDownList($branch, ['placeholder' => 'Select Branch'])->label('Hospital Branch') ?>

                    <?= $form->field($model, 'gender_id')->dropDownList($gender, ['placeholder' => 'Select Gender'])->label('Gender') ?>

                    <?= $form->field($model, 'hospital_roleId')->dropDownList($hospital_role, ['placeholder' => 'Select Hospital Role'])->label('Hospital Role') ?>

                    <?php //echo $form->field($model, 'created_at')->textInput() ?>

                    <?php //echo $form->field($model, 'updated_at')->textInput() ?>

                    <div class="form-group d-flex flex-row">
                        <?= Html::a(Yii::t('app', 'BACK'), ['/admin/view', 'id' => $model->user_id], ['class' => 'btn btn-outline-success']) ?>
                        <?= Html::submitButton(Yii::t('app', 'SAVE'), ['class' => 'btn btn-danger d-block mr-0 ml-auto']) ?>
                    </div>


                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>  
</div>
