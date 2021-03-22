<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12 col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <div class="form-group d-flex flex-row">
                        <?= Html::a(Yii::t('app', 'BACK'), ['/admin/index'], ['class' => 'btn btn-outline-success']) ?>   
                        <?= Html::submitButton('Save', ['class' => 'btn btn-danger d-block mr-0 ml-auto', 'name' => 'signup-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?> 
                </div>
            </div>
        </div>
    </div>
</div>
