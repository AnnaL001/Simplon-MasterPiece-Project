<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Gender;
use common\models\Location;

/* @var $this yii\web\View */
/* @var $model common\models\DonorProfile */
/* @var $form ActiveForm */
$gender = ArrayHelper::map(Gender::find()->all(), 'gender_id', 'gender_name');
$location = ArrayHelper::map(Location::find()->all(), 'location_id', 'location_name');
?>
<div class="profile">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12 col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <?php $form = ActiveForm::begin(); ?>

                        <?php //echo $form->field($model, 'user_id') ?>
                        <?= $form->field($model, 'firstname') ?>
                        <?= $form->field($model, 'middlename') ?>
                        <?= $form->field($model, 'surname') ?>
                        <?= $form->field($model, 'phoneNo') ?>
                        <?= $form->field($model, 'gender_id')->dropDownList($gender, ['placeholder' => 'Select Gender'])->label('Gender') ?>
                        <?= $form->field($model, 'location_id')->dropDownList($location, ['placeholder' => 'Select Location'])->label('Branch Location') ?>  
                        <?php //echo $form->field($model, 'reward_points') ?>
                        <?php //echo $form->field($model, 'level_id') ?>
                        <?php //echo $form->field($model, 'created_at') ?>
                        <?php //echo $form->field($model, 'updated_at') ?>
                    
                        <div class="form-group d-flex flex-row">
                            <?= Html::a(Yii::t('app', 'Back'), ['/donor/view','id' => $model->user_id], ['class' => 'btn btn-outline-success']) ?>
                            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-danger d-block mr-0 ml-auto']) ?>
                        </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div><!-- profile -->
