<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

//$this->title = $model->id;
//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p> 
        <?php //echo Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php /*echo Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) */?>
    </p> -->
    <?= Html::a(Yii::t('app', 'Back'), ['/donor/index'], ['class' => 'btn btn-outline-success mb-3']) ?>
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <?= Html::img('@web/../img/user_icon.png',['class'=>'img-user mx-4']);?>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-8">
            <div class="card shadow">
                <div class="card-body px-5 py-4">
                    <p class="mt-2 normal-text"><b> Name:</b><br> 
                        <?= $model->firstname." ".$model->middlename." ".$model->surname?>
                    </p>
                    <p class="normal-text"><b> Email:</b><br> <?= $model->user->email ?></p>
                    <p class="normal-text"><b> Phone No:</b><br> <?= $model->phoneNo ?> </p>
                    <?= Html::a(Yii::t('app', 'Update profile'), ['/donor-profile/update', 'id' => $model->id], ['class' => 'btn btn-outline-success mt-3']) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12 col-md-4">
            <div class="card shadow py-3 px-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="mb-3"> OTHER INFO </h4>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-3">
                            <?= Html::img('@web/../img/user_icon.png',['class'=>'img-fluid']);?>
                        </div>
                        <div class="col-8">
                              <p class="normal-text"> <b> Role: </b> <br> <?= $model->user->role->role_name ?> </p>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-3">
                            <?php   
                                if($model->gender->gender_id == 1){
                                    echo(Html::img('@web/../img/male.png',['class'=>'img-fluid mt-2']));
                                } elseif($model->gender->gender_id = 2){
                                    echo(Html::img('@web/../img/female.png',['class'=>'img-fluid']));
                                } else {
                                    echo(Html::img('@web/../img/gender.png',['class'=>'img-fluid mt-3'])); 
                                }
                            ?> 
                        </div>
                        <div class="col-8">
                              <p class="mt-2 normal-text"> <b> Gender: </b> <br> <?= $model->gender->gender_name ?>
                              </p>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-3">
                            <?= Html::img('@web/../img/crown.png',['class'=>'img-fluid']); ?>
                        </div>
                        <div class="col-8">
                              <p class="normal-text"> <b> <?= $model->level->level_name ?> </b> <br> 
                              <?= $model->reward_points." "."pts" ?>
                              </p>
                        </div>
                    </div>
                    <div class="row mt-4 mb-4">
                        <div class="col-3">
                            <?php
                                if($model->donor_eligibility == 1){
                                    echo(Html::img('@web/../img/tick.png',['class'=>'img-fluid']));
                                } else{
                                    echo(Html::img('@web/../img/cross.png',['class'=>'img-fluid']));
                                }
                            ?>
                        </div>
                        <div class="col-8">
                              <p class="mt-2 normal-text">
                              <?php 
                                if($model->donor_eligibility == 1){
                                    echo('Can donate');
                                }else{
                                    echo('Cannot donate');
                                }
                              ?>
                              </p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="col-12 col-md-8">
            <div class="card shadow">
                <div class="card-body px-5 py-4">
                    <h4 class="mb-3"> MEDICAL RECORD </h4>
                    <p class="normal-text"> 
                        <b> Date of birth:</b> <br> <?= $record->date_of_birth ?>
                    </p>
                    <p class="normal-text"> 
                        <b> Blood type:</b> <br> <?= $record->bloodType->blood_typeName ?>
                    </p>
                    <p class="normal-text"> 
                        <b> Body weight in Kgs:</b> <br> <?= $record->weight ?>
                    </p>
                    <p class="normal-text"> 
                        <b> Haemoglobin levels:</b> <br> <?= $record->haemoglobin_level ?>
                    </p>
                    <p class="normal-text"> 
                        <b> Presence of conditions:</b> <br> 
                        <?= $record->presence_of_conditions ?>
                    </p>
                    <p class="normal-text"> 
                        <b> Comments:</b> <br>
                        <?= $record->comments ?>
                    </p>
                </div> 
            </div>
        </div>
    </div>

</div>
