<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Gender;
use yii\helpers\ArrayHelper;
use common\models\Location;
/* @var $this yii\web\View */
/* @var $model common\models\DonorProfile */
/* @var $form yii\widgets\ActiveForm */
$gender = ArrayHelper::map(Gender::find()->all(), 'gender_id', 'gender_name');
$location = ArrayHelper::map(Location::find()->all(), 'location_id', 'location_name');
?>

<div class="donor-profile-form">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12 col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'user_id')->hiddenInput(['value'=>yii::$app->user->id])->label(false) ?>

                    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'middlename')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'phoneNo')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'gender_id')->dropDownList($gender, ['placeholder' => 'Select Gender'])->label('Gender') ?> 

                    <?= $form->field($model, 'location_id')->dropDownList($location, ['placeholder' => 'Select Location'])->label('Branch Location') ?>  

                    <?php //echo $form->field($model, 'reward_points')->textInput() ?>

                    <?php //echo $form->field($model, 'level_id')->textInput() ?>

                    <?php //echo $form->field($model, 'donor_eligibility')->textInput() ?>

                    <?php //echo $form->field($model, 'created_at')->textInput() ?>

                    <?php //echo $form->field($model, 'updated_at')->textInput() ?>

                    <div class="form-group d-flex flex-row">
                        <?= Html::a(Yii::t('app', 'BACK'), ['/donor-profile/profile', 'id' => $model->user_id], ['class' => 'btn btn-outline-success']) ?>
                        <?= Html::submitButton(Yii::t('app', 'SAVE'), ['class' => 'btn btn-danger d-block mr-0 ml-auto']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
