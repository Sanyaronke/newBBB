<div class="d-flex justify-content-around py-5 px-3">
    <div class="col">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card border-0 rounded-lg">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">Profil <?=Alert::echoAlert()?> </h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/edit-profil">
                            <input type="hidden" name="position" value="<?= $profils->id_user?>">
                            
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="first_names">Votre Nom</label>
                                        <input class="form-control py-4" id="first_names" name="first_names" type="text"
                                            value="<?=$profils->first_names?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="last_names">Votre Prénom</label>
                                        <input class="form-control py-4" id="last_names" name="last_names" type="text"
                                            value="<?=$profils->last_names?>" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-row d-flex align-items-center justify-content-around">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="dates">Dates de Naissance</label>
                                        <input class="text-primary form-control py-4" id="dates" name="date" type="date" 
                                            value="<?=$profils->date?>"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="genders"
                                            id="gendersF" value="1" <?php if($profils->genders==='1')  echo 'checked' ;?> >
                                        <label class="form-check-label" for="gendersF">F</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="genders"
                                            id="gendersM" value="2" <?php if($profils->genders==='2')  echo 'checked' ;?> >
                                        <label class="form-check-label" for="gendersM">M</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="small mb-1" for="inputEmailAddress">Votre Email</label>
                                <input class="form-control py-4" id="inputEmailAddress" type="email"
                                    aria-describedby="emailHelp" value="<?=$profils->emails?>" readonly />
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="licences">Votre numero de licence</label>
                                        <input class="form-control py-4" id="licences" name="licences" type="text"
                                            value="<?=$profils->licences?>" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="small mb-1" for="oldPass">Mot de passe</label>
                                        <input class="form-control py-4" id="oldPass" name="oldPass" type="password"
                                            placeholder="Ancien mot de passe" />
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
                                <button type="submit" class="btn btn-primary btn-block">Valider</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="profil">
        <img src="../../../public/images/profils/no-img.png" alt="">
    </div>
</div>