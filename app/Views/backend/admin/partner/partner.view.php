<div class="d-flex align-items-center justify-content-between">
    <h1 class="mt-4">Les Partenaires <?= Alert::echoAlert()?></h1>
</div>

<div class="">
    <div class="col-11 col-md-5 card mt-5 mb-5 px-0 bg-body rounded">
        <div class="card-header px-0">
            Ajouter un partenaire - BBB
        </div>
        <div class="card-body">
            <?= $createForm ?>
        </div>
    </div>

</div>

<div class="card my-4 shadow-sm p-3 mb-5 bg-body rounded">
    <div class="card-header ">
        <i class="fas fa-table mr-1"></i>
        <span class="text-warning "><strong>Liste Des Partenaires - BBB</strong></span>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <?= $updateTable ?>
        </div>
    </div>
</div>
