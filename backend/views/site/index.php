<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use sjaakp\gcharts\PieChart;
use sjaakp\gcharts\BarChart;
$this->title = 'My Yii Application';
?>
<div class="site-index">
    <section class="stats">
        <div class="container">
            <p> Welcome Admin,</p>
            <div class="row">
                <div class="col-12 col-md-3">
                    <div class="card shadow py-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <?= Html::img('@web/../img/blooddonationbag.png',['class'=>'img-fluid']);?>
                                </div>
                                <div class="col-7 pt-2">
                                    <h5 class="card-title normal-text"> Blood donations </h5>
                                    <h6 class="card-text normal-text"> <?= $donations ?> </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card shadow py-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <?= Html::img('@web/../img/donor_icon.png',['class'=>'img-fluid pt-3']);?>
                                </div>
                                <div class="col-7 pt-2">
                                    <h5 class="card-title normal-text"> Blood donors </h5>
                                    <h6 class="card-text normal-text"> <?= $donors ?> </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card shadow py-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <?= Html::img('@web/../img/hospital.png',['class'=>'img-fluid pt-2']);?>
                                </div>
                                <div class="col-7 pt-2">
                                    <h5 class="card-title normal-text"> Hospital branches </h5>
                                    <h6 class="card-text normal-text"> <?= $hospital_branches ?> </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="card shadow py-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <?= Html::img('@web/../img/blood_pints.png',['class'=>'img-fluid']);?>
                                </div>
                                <div class="col-7 pt-2">
                                    <h5 class="card-title normal-text"> Blood pints </h5>
                                    <h6 class="card-text normal-text"> <?= $blood_pints ?> </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="graphs">
        <div class="container">
            <div class="row mt-5">
                <div class="col-12 col-md-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <?php //echo Html::img('@web/../img/pie_chart.png',['class'=>'img-fluid']);?> 
                            <?= PieChart::widget([
                                'height' => '300px',
                                'dataProvider' => $dataProvider,
                                'columns' => [
                                    'bloodType.blood_typeName:string',
                                    'weight'
                                ],
                                'options' => [
                                    'title' => 'Body weight by blood type',
                                    'is3D' => true
                                ],
                            ]) ?>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <?php //echo Html::img('@web/../img/bar_graph.png',['class'=>'img-fluid py-2']);?> 
                            <?= BarChart::widget([
                                'height' => '300px',
                                'dataProvider' => $dataProvider,
                                'columns' => [
                                    'bloodType.blood_typeName:string',
                                    'weight'
                                ],
                                'options' => [
                                    'title' => 'Body weight by blood type',
                                    'is3D' => true
                                ],
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
