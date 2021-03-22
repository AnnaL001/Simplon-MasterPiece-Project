<?php
use yii\helpers\Html;
use yii\widgets\ListView;
?>
<div class="donation-history"> 
    <h4 class="mb-3"> Donation history </h4>
    <?= ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_history_item',
    ]); ?>
</div>