<?php

use App\Helpers\Helper;
?>

<div class="d-flex align-items-center justify-content-between">
    <h1 class="mt-4">Modification de <?= $coachs->last_names ?></h1>
    <a style="font-size: 13px;" class="btn bg-primary text-white" href="<?= Helper::routename('admin.coach') ?>"><i class="fas fa-user-plus"></i> Liste Des Coachs</a>
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
                        <form method="POST" action="/update-coach/<?= $coachs->id_user?>">

                            <input type="hidden" name="position" value="<?= $coachs->id_user?>">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="first_names">Nom</label>
                                        <input class="form-control py-4" id="first_names" name="first_names" type="text"
                                            value="<?= $coachs->first_names?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="last_names">Prénom</label>
                                        <input class="form-control py-4" id="last_names" name="last_names" type="text"
                                            value="<?= $coachs->last_names?>" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-row d-flex align-items-center justify-content-around">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="date">Dates de Naissance</label>
                                        <input class="form-control py-4" id="date" name="date" type="date"
                                            value="<?= $coachs->date?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="genders"
                                            id="gendersF" value="1" <?php if($coachs->genders==='1')  echo 'checked' ;?> >
                                        <label class="form-check-label" for="gendersF">F</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="genders"
                                            id="gendersM" value="2" <?php if($coachs->genders==='2')  echo 'checked' ;?> >
                                        <label class="form-check-label" for="gendersM">M</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="small mb-1" for="email">le Email</label>
                                <input class="form-control py-4" id="email" name="emails" type="email"
                                    aria-describedby="emailHelp" value="<?= $coachs->emails?>" />
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="passwords">Numero de licence</label>
                                        <input class="form-control py-4" id="passwords" name="licences" type="text"
                                            value="<?= $coachs->licences?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="passwords">Nouveau mot de passe</label>
                                        <input class="form-control py-4" id="passwords" name="passwords" type="password"
                                            placeholder="Nouveau mot de passe" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputConfirmPassword">Confirmer Mot de
                                            passe</label>
                                        <input class="form-control py-4" id="inputConfirmPassword" type="password"
                                            placeholder="Confirmer le mot de passe" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-4 mb-0">
                                <button type="submit" class="btn btn-primary btn-block">Create Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>