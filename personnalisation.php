<?php
require_once __DIR__ . ('/utilities/header.php');
?>

<section class="image-container">
    <img src="/assets/boutique/perso.jpg" class="img-fluid" alt="t-shirt noir">
    <img src="/assets/boutique/t.jpg" class="superposed-image" alt="Description de l'image">
</section>

<section class="centre d-flex ">
    <div class="row ms-5">

        <?php
        require_once __DIR__ . ('/personnalisation/texte/texte.php');
        require_once __DIR__ . ('/personnalisation/compo/compo.php');
        ?>

    </div>
</section>

<?php
require_once __DIR__ . ('/personnalisation/avis/index.php');

require_once __DIR__ . ('/utilities/footer.php')
?>