<?php
require_once __DIR__ . '../../utilities/header.php';
require_once __DIR__ . '../../config/config.php';
require_once __DIR__ . '../../function/database.fn.php';
require_once __DIR__ . '../../function/boutique.fn.php';

$db = getPDOlink($config);
$types = getTypes($db);
$tailles = getTailles($db);
$quantites = getQuantités($db);


// Définir le filtre par défaut
$typeFilter = 0;

// Vérifier si un filtre de type a été soumis via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['type'])) {
    $typeFilter = $_POST['type'];
}

// Récupérer les Pokémon filtrés en fonction du type, ou tous les Pokémon si aucun filtre n'a été appliqué
$pokemons = getPokemon($db, $typeFilter);

?>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css'>
<script defer src="../assets/JS/ajout_panier.js"></script>
<link rel="stylesheet" href="../assets/CSS/slider.css">

<section class="image-container mt-5 overflow-x-hidden">
    <div class="row">
        <!-- Image du t-shirt -->
        <div class="col-md-6 order-md-1 order-2">
            <img src="/assets/boutique/perso.jpg" class="img-fluid" alt="t-shirt noir">
            <img src="<?= $pokemons[0]['pokemon_image'] ?>" class="superposed-image img-fluid" alt="visuel de l'image">
        </div>
        <!-- Filtre et Slider -->
        <div class="col-md-6 order-md-2 order-1 mt-5">

            <section class="filtre d-flex justify-content-center mb-3 mt-5">
                <form action="" method="post" class="d-flex align-items-center">
                    <select name="type" id="selectType" class="form-select me-2">
                        <option value="0">Tous les types</option>
                        <?php foreach ($types as $type) : ?>
                            <option value="<?php echo $type['id']; ?>" <?php echo $type['id'] == $typeFilter ? 'selected' : ''; ?>><?php echo $type['nom']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" class="btn btn-primary">Filtrer</button>
                </form>
            </section>

            <section class="slider">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($pokemons as $pokemon) : ?>
                            <div class="swiper-slide">
                                <div class="slider-container">
                                    <img src="<?= $pokemon['pokemon_image']; ?>" alt="<?= $pokemon['pokemon_nom']; ?>" class="img-fluid rounded-3">
                                    <span style="background-color: <?= $pokemon['type_couleur']; ?>"><?= $pokemon['pokemon_nom']; ?></span>
                                    <h2>N°<?= $pokemon['pokemon_id']; ?></h2>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>

            <section class="selection text-center">
                <div class="container">
                    <div class="row justify-content-center align-items-center">
                        <div class="col-md-8">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <select class="form-control" id="taille" name="taille">
                                            <option value="taille-tshirt">Taille T-shirt</option>
                                            <?php foreach ($tailles as $taille) : ?>
                                                <option value="<?php echo $taille['taille']; ?>"><?php echo $taille['taille']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="form-control" id="quantite" name="quantite">
                                            <option value="quantite-tshirt">Quantité</option>
                                            <?php foreach ($quantites as $quantite) : ?>
                                                <option value="<?php echo $quantite['quantite']; ?>"><?php echo $quantite['quantite']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group text-center">
                                        <?php
                                        // Récupérer le prix normal depuis la base de données
                                        $prixNormal = getPrix($db);
                                        ?>
                                        <input type="text" class="form-control" id="prix" name="prix" value="Prix : <?php echo $prixNormal; ?> € TTC" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <button type="button" class="btn btn-success" id="addToCart">Ajouter au panier</button>
                        </div>
                    </div>
                </div>
            </section>

            <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js'></script>
            <script src="../assets/JS/slider.js"></script>
        </div>
    </div>
</section>

<?php
require_once __DIR__ . '../../personnalisation/avis/index.php';
require_once __DIR__ . '../../utilities/footer.php';
?>