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

<div class="row">
        <div class="col-12 col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <?= Html::img('@web/../img/user_icon.png',['class'=>'img-user mx-4']);?>
                </div>
            </div>
            <div class="card shadow mt-4">
                <div class="card-body py-5 px-5">
                        <div class="row">
                            <div class="col-12">
                                <h4 class="mb-3"> OTHER INFO </h4>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-3">
                                <?= Html::img('@web/../img/hospital.png',['class'=>'img-fluid']);?>
                            </div>
                            <div class="col-8">
                                <p> <b> Hospital branch: </b> <br> <?= $profile->branch->branch_name ?> </p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-3">
                                <?= Html::img('@web/../img/user_icon.png',['class'=>'img-fluid']);?>
                            </div>
                            <div class="col-8">
                                <p> <b> Role: </b> <br> <?= $model->role->role_name ?> </p>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="col-12 col-md-8">
        <div class="card shadow">
                <div class="card-body py-5 px-5">
                    <h4 class=" mt-2 mb-4"> PROFILE INFO </h4>
                    <p class="mt-4"><b> Name:</b><br> 
                        <?= $profile->firstname." ".$profile->middlename." ".$profile->surname?>
                    </p>
                    <p class="mt-4"><b> Email:</b><br> <?= $model->email ?></p>
                    <p class="mt-4"><b> Phone No:</b><br> <?= $profile->phoneNo ?> </p>
                    <p class="mt-4"><b> Gender:</b><br> <?= $profile->gender->gender_name ?></p>
                    <p class="mt-4 mb-5"> <b> Hospital role:</b> <br> <?= $profile->hospitalRole->hospital_role ?></p>
                    <?= Html::a(Yii::t('app', 'Update profile'), ['/admin/profile','id' => $profile->user_id], ['class' => 'btn btn-outline-success mt-5']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
