<?php

use App\Helpers\Helper;
?>

<div class="d-flex align-items-center justify-content-between">
    <h1 class="mt-4">Modification de <?= $partners->name_partner ?></h1>
    <a style="font-size: 13px;" class="btn bg-primary text-white" href="<?= Helper::routename('admin.coach') ?>"><i class="fas fa-user-plus"></i> Liste Des Partnaires</a>
</div>
<div class="d-flex justify-content-around py-5 px-3">
    <div class="col">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card border-0 rounded-lg">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Modification <?= Alert::echoAlert() ?></h3>
                    </div>
                    <div class="card-body">
                        <?= $partnerForm ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>