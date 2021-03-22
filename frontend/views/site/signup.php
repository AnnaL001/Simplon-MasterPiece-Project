<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12 col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <!--<h1><?php //echo Html::encode($this->title) ?></h1>

                    <p>Please fill out the following fields to signup:</p>

                 <div class="row">
                <div class="col-12 col-md-5"> -->
                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                        <?= $form->field($model, 'email') ?>

                        <?= $form->field($model, 'password')->passwordInput() ?>

                        <div class="form-group">
                            <?= Html::submitButton('Signup', ['class' => 'btn btn-danger d-block mr-0 ml-auto', 'name' => 'signup-button']) ?>
                        </div>

                    <?php ActiveForm::end(); ?> 
            <!--    </div>
            </div> -->

                </div>
            </div>
        </div>
    </div>
</div>
