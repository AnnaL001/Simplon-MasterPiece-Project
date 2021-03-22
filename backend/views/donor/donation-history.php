<?php
use yii\helpers\Html;
use yii\widgets\ListView;
?>
<div class="donation-history">
    <?= Html::a(Yii::t('app', 'BACK'), ['/donor/view','id' => $model->id], ['class' => 'btn btn-outline-success mb-5']) ?>    
    <h4 class="mb-3"> Donation history </h4>
    <?= ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_history_item',
    ]); ?>
    <?php 
        //if($donations == null){
    ?>
       <!-- <div class="alert alert-warning">
            There are no recorded and verified blood donations
        </div>      
    <?php //} else { ?>
         <?php
         //foreach($donations as $donation){
        ?> 
            <div class="card shadow mb-3">
                <div class="card-body">
                    <h4 class="mb-3"> DONATION </h4>
                    <p class="normal-text"><b> Branch: </b> <br> <?php //echo $donation->alert->branch->branch_name?></p>
                    <p class="normal-text"><b> Location: </b> <br> <?php //echo $donation->alert->branch->location->location_name ?></p>
                    <p class="normal-text"><b> Blood quantity: </b> <br> <?php //echo $donation->quantity->quantityInPints." "."pints" ?></p>
                    <p class="normal-text"><b> Date: </b> <br> <?php //echo $donation->created_at ?></p>
                </div>
            </div>-->
        <?php //} ?>
    <?php //} ?>
</div>