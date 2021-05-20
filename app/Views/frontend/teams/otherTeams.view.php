<?php
// deux tableau qui vont stoquer les etiquete 3A ou 3B
$stock_tab = [];
$stock_tab2 = [];

// echo "<pre>";
// var_dump($equipes);
// die();
// on stoc dans le tablelau 1 les etiqueter y en a 8 en tout
foreach ($equipes as $key) {
    $stock_tab[] = $key->category_name;
}
// on dedoublone le tableau on se retrouve avec tab = [0=> 3A , 7=>3B]
$dedoublone = array_unique($stock_tab);
// on stoc dans le tablelau 2 les etiqueter pour obtenir tab = [0 => 3A , 1 =>3B]
foreach ($dedoublone as $key) {
    $stock_tab2[] = $key;
}
?>
<!--PNM MATCH-->
<div style="padding-top: 100px;" style="min-height: 100vh;" class="position-relative p-0 m-0 pnm--home container-fluid">

    <div class="">
        <?php for ($i = 0; $i < count($stock_tab2); $i++) : ?>
            <div class="col-8 mx-auto my-5 text-center text-light"><?= $stock_tab2[$i] ?></div>
            <div style="min-height:100vh;" class="coach--card col-12 p-5">
                <div class="row justify-content-center">
                    <div class="col-12 d-flex align-items-around flex-wrap mb-5">
                        <!-- TEAM PICTURE -->
                        <div style="min-height:380px" class="col-10 col-lg-6 mx-auto mb-4">
                            <img class="rounded img-fluid img-thumbnail w-100" src="../public/images/teams/nba.jpeg" alt="">
                        </div>
                        <!-- END TEAM PICTURE -->
                        <!-- TEAM PLANING -->
                        <div class="col-12 col-lg-5 m-auto ">
                        <div class="mb-5">
                            <h3 class="text-center">Planing d'entrainement</h3>
                            </div>
                            <table class="table table-borderless text-nave mb-5">
                                <thead>
                                    <tr>
                                        <th scope="col">Jours</th>
                                        <th scope="col">Lieu</th>
                                        <th scope="col">Heures</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Lundi</td>
                                        <td>Stade Promis</td>
                                        <td>19h30</td>
                                    </tr>
                                    <tr>
                                        <td>Mercredi</td>
                                        <td>Salle Thier Benauge</td>
                                        <td>20h00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="col-12 d-flex align-items-around flex-wrap mb-5">
                        <!-- END TEAM PLANING -->
                        <!-- PLAYER NAME -->
                        <div class="col-12 col-lg-6 mx-auto">
                            <div class="mb-5">
                            <h3 class="text-center">Composition de l'équipe</h3>
                            </div>
                            <table class="table table-borderless text-nave mb-5">
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">Nom Prenom</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($equipes as $keys): ?>
                                        <?php if ($keys->category_name === $stock_tab2[$i]) :; ?>
                                            <tr>
                                                <td>10 </td>
                                                <td><?= ($keys->first_names) . ' - ' . ($keys->last_names); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- END PLAYER NAME -->
                        <!-- TEAM COACH -->
                        <div class="col-12 col-md-6 mx-auto">
                            <div class="row justify-content-between m-0 p-0">
                                
                                <?php foreach ($coachs as $coach) :; ?>
                                <?php if ($coach->category_name === $stock_tab2[$i]) :; ?>
                                    <div class="coach--card col-12 col-md-6 mx-auto text-center m-2">
                                        <img width="100%" src="../public/images/profils/test.jpg" class=" text-center mx-auto w-100" alt="">
                                        <br> <span><?= $coach->first_names . $coach->last_names ?></span>
                                    </div>
                                    <?php endif; ?>
                                <?php endforeach;; ?>
                            </div>
                        </div>
                        <!--END TEAM COACH -->
                    </div>

                </div>
            </div>
        <?php endfor; ?>
    </div>

</div>