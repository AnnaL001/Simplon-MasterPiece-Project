<div class="card shadow mb-3">
    <div class="card-body">
        <h4 class="mb-3"> DONATION </h4>
        <p class="normal-text"><b> Branch: </b> <br> <?= $model->alert->branch->branch_name?></p>
        <p class="normal-text"><b> Location: </b> <br> <?= $model->alert->branch->location->location_name ?></p>
        <p class="normal-text"><b> Blood quantity: </b> <br> <?= $model->quantity->quantityInPints." "."pints" ?></p>
        <p class="normal-text"><b> Date: </b> <br> <?= $model->created_at ?></p>
    </div>
</div>