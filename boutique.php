<?php
require_once __DIR__ . ('/utilities/header.php');
?>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-1 p-0">
                <div class="card mb-5 align-items-center">
                    <div class="row g-0 align-items-center">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h2 class="card-title">Partez de Zéro</h2>
                                <a button type="button" class="btn btn-danger btn-lg" href="/personnalisation.php">JE PERSONNALISE</button></a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img src="/assets/boutique/0.png" class="img-fluid rounded-3" alt="t-shirt noir avec un pokemon en image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container-fluid text-white text-center mb-5">
    <h1>T-shirt Personnalisé</h1>
    <p class="mx-auto" style="max-width: 800px">Que vous soyez un fan de Pikachu, un admirateur de Bulbizarre ou un amoureux de Salamèche,
        notre IA peut générer une image de Pokémon pour votre t-shirt qui est aussi unique que vous.
        De plus, nos t-shirts sont fabriqués avec des matériaux de haute qualité pour assurer confort et durabilité.
    </p>
</div>
<section class="centre rounded-3">
    <div class="row justify-content-between">
        <div class="col-xs-6 col-md-3 text-center fw-semibold fs-5">
            <img src="/assets/boutique/france.png" class="img-fluid" width="150" height="50" alt="">
            <div class="text-dark">Imprimé en France</div>
        </div>
        <div class="col-xs-6 col-md-3 text-center fw-semibold fs-5">
            <img src="/assets/boutique/coton.png" class="img-fluid" width="150" height="50" alt="">
            <div class="text-dark">Coton 100% bio</div>
        </div>
        <div class="col-xs-6 col-md-3 text-center fw-semibold fs-5">
            <img src="/assets/boutique/eco.png" class="img-fluid" width="150" height="50" alt="">
            <div class="text-dark">Eco-Responsable</div>
        </div>
        <div class="col-xs-6 col-md-3 text-center fw-semibold fs-5">
            <img src="/assets/boutique/livraison.png" class="img-fluid" width="150" height="50" alt="">
            <div class="text-dark">Livraison Express</div>
        </div>
    </div>
</section>
<section class="carousel">
    <h2 class="text-white text-center mt-4 mb-3">Trouvez des idées de personnalisation</h2>
    <?php
    require_once __DIR__ . ('/carousel/index.php')
    ?>
</section>




<?php
require_once __DIR__ . ('/utilities/footer.php')
?>