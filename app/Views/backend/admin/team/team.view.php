<div class="d-flex align-items-center justify-content-between">
    <h1 class="mt-4">Les Joueurs <?= Alert::echoAlert()?></h1>
    <button style="font-size: 13px;" type="button" class="btn btn-primary" data-bs-toggle="modal"
        data-bs-target="#exampleModal">
        <i class="fas fa-user-plus"></i>Ajouter un Joueur
    </button>
</div>

<div class="card my-4 shadow-sm p-3 mb-5 bg-body rounded">
    <div class="card-header ">
        <i class="fas fa-table mr-1"></i>
        <span class="text-warning "><strong>Mis a jour Urgens</strong></span>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <?= $updateTable ?>
        </div>
    </div>
</div>
