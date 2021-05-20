<style>
.header-content {
    background: url("../../../../public/images/teams/image.jpg") no-repeat center center;
    background-size: cover;
    background-attachment: fixed;
}
</style>


<div style="min-height: 100vh;" class="header-content container-fluid p-0 m-0">
    <div class="header-presentation-content d-flex align-items-center justify-content-center">
        <div class="header-content-title text-white d-flex flex-column align-items-center">
            <h1>bordeaux bastide basket</h1>
            <span>Rejoignez notre équipe plein de jeune talent avec notre équipe première évoluant en
                prénationale</span>
            <span>Participer au stage de basket que nous organisons chaque vacances dans le but de dénicher de nouveaux
                talent </span>
            <div class="my-3">
                <a class="btn btn-warning" href="#">Nous Contacter </a>
            </div>
            <p>Venez Nombreux supporter notre équipe première ce samedi de 20h au palais des sport de bordeaux</p>
        </div>
    </div>
</div>
<div style="min-height: 100vh;" class="bg-white container-fluid p-0 m-0">
    <h2 class="py-5 text-center">Les matchs à venir </h2>
    <div class="row align-items-center justify-content-around p-0 m-0">

        <div class="col-12 col-md-10 col-lg-6">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/iframe-resizer/3.5.5/iframeResizer.min.js"></script>
            <script>
            if (!window._rsz) {
                window._rsz = function() {
                    var i = iFrameResize({
                        checkOrigin: false,
                        interval: 100
                    });
                };
                if (document.readyState != "loading") {
                    _rsz()
                } else {
                    document.addEventListener("DOMContentLoaded", _rsz)
                }
            }
            </script><iframe id="60a6d3edcbd7b90a1d055467"
                src="https://scorenco.com/widget/60a6d3edcbd7b90a1d055467/?auto_height=true"
                style="display: block; width: 100%; overflow: auto; margin: auto; border-width: 0px;"
                scrolling="no"></iframe><a style="font-size:11px" target="_blank"
                href="https://scorenco.com/basket/clubs/bordeaux-bastide-basket/">Bordeaux Bastide Basket sur
                Score'n'co</a>
        </div>
        <div class="col-12 col-md-10 col-lg-5">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/iframe-resizer/3.5.5/iframeResizer.min.js"></script>
            <script>
            if (!window._rsz) {
                window._rsz = function() {
                    var i = iFrameResize({
                        checkOrigin: false,
                        interval: 100
                    });
                };
                if (document.readyState != "loading") {
                    _rsz()
                } else {
                    document.addEventListener("DOMContentLoaded", _rsz)
                }
            }
            </script><iframe id="6093ccdfee73050a1be1ca56"
                src="https://scorenco.com/widget/6093ccdfee73050a1be1ca56/?auto_height=true"
                style="display: block; width: 100%; overflow: auto; margin: auto; border-width: 0px;"
                scrolling="no"></iframe><a style="font-size:11px" target="_blank"
                href="https://scorenco.com/basket/clubs/bordeaux-bastide-basket/">Bordeaux Bastide Basket sur
                Score'n'co</a>
        </div>
    </div>
</div>

<div style="min-height: 80vh;" class="bg-light container-fluid p-0 m-0">
    <h2 class="py-5 text-center">Les Actualités du club </h2>
    <div class="row align-items-center justify-content-center p-0 m-0">
        <?php foreach ($actualites as $actualite): ?>
        <div style="width: 400px; height:300px" class="m-4 actualite card bg-dark text-white p-0 m-0">
            <img src="../../../../public/images/actualites/<?=$actualite->pictures ?>" class="card-img" alt="...">
            <div class="card-img-overlay">
                <h5 class="card-title"><?=$actualite->actu_title ?></h5>
            </div>
        </div>
        <?php endforeach; ?>

        <div style="width: 400px; height:300px" class="m-4 card bg-dark text-white">
            <img width="400" height="300"
                src="../../../../public/images/actualites/d3d997dd9ca1a6f374b471ca6bf5c04e.jpg" class="card-img"
                alt="...">
            <div class="card-img-overlay">
                dfhbfb

            </div>
        </div>
    </div>
</div>

<div style="min-height: 200px;" class="p-5 mx-auto container-fluid">
    <h3>Il nous font confiance</h3>
    <div class="container d-flex flex-wrap align-items-center justify-content-center mx-auto py-2 ">
        <img class="m-2" height="50" width="150"
            src="http://www.ffbb.com/sites/default/files/styles/large/public/ffbb_hoz_blanc.png?itok=MGvPdXbJ" alt="">
        <img class="m-2" height="50" width="150"
            src="http://www.ffbb.com/sites/default/files/styles/large/public/ffbb_hoz_blanc.png?itok=MGvPdXbJ" alt="">
        <img class="m-2" height="50" width="150"
            src="http://www.ffbb.com/sites/default/files/styles/large/public/ffbb_hoz_blanc.png?itok=MGvPdXbJ" alt="">
        <img class="m-2" height="50" width="150"
            src="http://www.ffbb.com/sites/default/files/styles/large/public/ffbb_hoz_blanc.png?itok=MGvPdXbJ" alt="">
        <img class="m-2" height="50" width="150"
            src="http://www.ffbb.com/sites/default/files/styles/large/public/ffbb_hoz_blanc.png?itok=MGvPdXbJ" alt="">
    </div>


    <div id="footer--nav" class="container-fluid d-flex align-items-center py-5 justify-content-between">
        <img src="../public/images/logo/lo.png" class="d-none d-lg-block" alt="">
        <div class="col row align-items-center justify-content-center">
            <ul class="nav flex-column col-12 col-xs-12, col-sm-6, col-md-3">
                <h3>Contact</h3>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="#">
                        <span><i class="fas fa-map-marker-alt"></i></span> 96 rue de la benauge <br> 33100 bordeaux
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span><i class="fas fa-phone-alt"></i></span> 06 06 06 06 06
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span><i class="fas fa-phone-alt"></i></span> 06 06 06 06 06
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><span><i class="far fa-envelope"></i></span>
                        bordeauxBB@club.fr</a>
                </li>
            </ul>

            <ul class="nav flex-column col-12 col-xs-12, col-sm-6, col-md-3 ">
                <h3>Ffbb</h3>
                <li class="nav-item">
                    <a class="nav-link" href="http://www.ffbb.com/sites/default/files/annuaire_complet_6.pdf"><span><i
                                class="fab fa-gg-circle"></i></span> Annuaire officiel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        href="https://f2.quomodo.com/BE6FA1F5/uploads/874/Reglement%20Mini%20Basket%202019-2020.pdf"><span><i
                                class="fab fa-gg-circle"></i></span> RÈGLEMENT MINI-BASKET</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        href="http://www.ffbb.com/sites/default/files/reglements_sportifs_generaux_vdef_14.pdf"><span><i
                                class="fab fa-gg-circle"></i></span> RÈGLEMENTS
                        SPORTIFS GENERAUX</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        href="https://f2.quomodo.com/BE6FA1F5/uploads/872/Reglement%20Sportif%20Ligue%202019-2020.pdf"><span><i
                                class="fab fa-gg-circle"></i></span> REGLEMENTS NAQ</a>
                </li>
            </ul>

            <ul class="nav flex-column col-12 col-xs-12, col-sm-6, col-md-3">
                <h3>Sociaux</h3>
                <li class="nav-item">
                    <a class="nav-link" href="#"><span><i class="fab fa-facebook"></i></span> Facebook</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><span><i class="fab fa-instagram"></i></span> Instagram</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><span><i class="fab fa-youtube"></i></span> Youtube</a>
                </li>
            </ul>
        </div>
    </div>
</div>
</div>