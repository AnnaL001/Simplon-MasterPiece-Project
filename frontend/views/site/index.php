<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <section class="stats">
        <div class="container">
            <p> Welcome, blood donor</p>
            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="card shadow py-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <?= Html::img('@web/img/blooddonationbag.png',['class'=>'img-fluid']);?>
                                </div>
                                <div class="col-7 pt-4">
                                    <h5 class="card-title"> Donations </h5>
                                    <h6 class="card-text"> <?= $donations  ?> </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card shadow py-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <?= Html::img('@web/img/crown.png',['class'=>'img-fluid py-3']);?>
                                </div>
                                <div class="col-7 py-2">
                                    <h5 class="card-text"> Donor level</h5>
                                    <h6 class="card-text"> <?= $profile->level->level_name ?> </h6>
                                    <h6 class="card-text"> <?= $profile->reward_points." "."pts"?> </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card shadow py-1">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <?= Html::img('@web/img/blood_pints.png',['class'=>'img-fluid']);?>
                                </div>
                                <div class="col-7 pt-4">
                                    <h5 class="card-title"> Blood pints </h5>
                                    <h6 class="card-text"> <?php
                                     if($blood_pints == 0){
                                        echo("0 pints");
                                     }else{
                                     echo($blood_pints." "."pints"); }?> </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
