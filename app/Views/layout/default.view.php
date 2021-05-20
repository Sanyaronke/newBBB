<?php

use App\Core\SecuriteHTML;
use App\Helpers\Helper;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link href="../../../public/assets/css/styles.css" rel="stylesheet" />
    <link href="../../../public/assets/css/main.css" rel="stylesheet" />

    <!-- faire gaff-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="front_body">

    <!-- NAVBAR -->
    <header id="nav--header" class=" animate__animated fixed-top mb-5">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?= Helper::routename('home') ?>"><img width="40" src="../public/images/logo/bbb-2.png" alt=""></a>
                <button class="bg-white navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse animate--nav navbar-collapse justify-content-end" id="navbarSupportedContent">

                    <ul id="f-nav" class="navbar-nav  mb-2 mb-lg-0">
                        <li id="pnm" class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Pnm
                            </a>
                            <ul class=" ulNav dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="<?= Helper::routename('pnm') ;?>">Effectif</a></li>
                                <li><a class="dropdown-item"
                                        href="<?= Helper::routename('pnm--calandar') ;?>">Calendrier</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li id="equipes" class=" nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Autres Equipes
                            </a>
                            
                            <ul class=" ulNav dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php foreach ($sub_categories as $category): ?>
                                <li><a class="dropdown-item"
                                        href="<?= Helper::routename('autres', [ 'id' => $category->id_team_category ]); ?>"><?=$category->category_name; ?></a>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li id="club" class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Le Club
                            </a>
                            <ul class="ulNav dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" aria-current="page"
                                        href="<?= Helper::routename('about'); ?>">A Propos</a>
                                </li>
                                <li><a class="dropdown-item" aria-current="page"
                                        href="<?= Helper::routename('surclassement'); ?>">surclassement</a></li>
                                <li><a class="dropdown-item" aria-current="page"
                                        href="<?= Helper::routename('referee'); ?>">Arbitres</a></li>
                                <li><a class="dropdown-item" aria-current="page"
                                        href="<?= Helper::routename('e_marque'); ?>">Formation
                                        Emarque</a></li>
                                <li><a class="dropdown-item" aria-current="page" href="<?= Helper::routename('party') ?>">Fete au club</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>

                    <ul id="r-nav" class="navbar-nav  mb-2 mb-lg-0">
                        <?php if (SecuriteHTML::checkedSeesion()): ?>

                        <li class="nav-item dropdown dropstart">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user fa-fw"></i>
                            </a>
                            <ul class="ulNav ml-auto text-light dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="<?= Helper::routename('profil') ?>">Profil</a></li>
                                <li><a class="dropdown-item" href="#">Parametre</a></li>
                                <li><a class="dropdown-item" href="<?= Helper::routename('logout') ?>">Déconnexion</a></li>
                            </ul>
                        </li>
                        <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?= Helper::routename('login'); ?>">SIGN IN
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div style="margin-top:100px" class="container-fluid p-0 m-0 overflow-hidden">
        <div class="container-fluid py-5 px-0 m-0">
            <?= $contents; ?>
        </div>
        <!-- FOOTER -->
        <footer style="height: 80px;" class="d-flex py-5 align-items-center flex-column justify-content-center">
            <span><span class="text-orange">©</span> Copyright 2021 Sharks-Antibes.com - Nous Contacter | Mentions
                légales
            </span>
            <span>site realiser pare saMAny</span>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="../../../public/assets/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <script src="../../../public/assets/js/main.js"></script>

</body>

</html>