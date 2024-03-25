<?php
require_once __DIR__ . ('/utilities/header.php');
require_once __DIR__ . ('/boutique/banniere/banniere.php');
?>

<div class="container-fluid text-white text-center mb-5">
    <h1>T-shirt Personnalisé</h1>
    <p class="mx-auto" style="max-width: 800px">Que vous soyez un fan de Pikachu, un admirateur de Bulbizarre ou un amoureux de Salamèche,
        notre IA peut générer une image de Pokémon pour votre t-shirt qui est aussi unique que vous.
        De plus, nos t-shirts sont fabriqués avec des matériaux de haute qualité pour assurer confort et durabilité.
    </p>
</div>

<?php
require_once __DIR__ . ('/boutique/logo/banniere-logo.php');
?>

<section class="carousel">
  <h2 class="text-white text-center mt-4 mb-3">Trouvez des idées de personnalisation</h2>

    <?php
    require_once __DIR__ . ('/boutique/carousel/index.php')
    ?>
    
</section>

<?php
require_once __DIR__ . ('/utilities/footer.php')
?>