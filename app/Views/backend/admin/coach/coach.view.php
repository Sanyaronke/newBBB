



<div class="d-flex align-items-center justify-content-between">
    <h1 class="mt-4">Les Coachs <?= Alert::echoAlert()?></h1>
    <button style="font-size: 13px;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="fas fa-user-plus"></i>Ajouter un Coach
    </button>
</div>

<div class="card mt-5 shadow-sm p-3 mb-5 bg-body rounded">
    <div class="card-header">
        La liste de tous les coachs - BBB
    </div>
    <div class="card-body ">
        <?= $newTable ?>
    </div>
</div>

<?php

// echo password_hash("daniele", PASSWORD_DEFAULT);