<?php
require_once __DIR__ . '/../utilities/header.php';
require_once __DIR__ . '../../config/config.php';
require_once __DIR__ . '../../function/database.fn.php';

$db = getPDOlink($config);

// Démarrer la session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>
<link rel="stylesheet" href="../assets/CSS/panier.css">
<section class="cart-container mt-5 mb-5">
    <h2>Votre panier</h2>
    
    <?php
    // Initialiser le total du panier à zéro
    $total_panier = 0;

    // Vérifier si le panier existe dans la session
    if (isset($_SESSION['panier']) && !empty($_SESSION['panier'])) {
        // Afficher chaque article du panier
        foreach ($_SESSION['panier'] as $index => $article) {
            // Générer un identifiant unique pour chaque article dans le panier
            $articleId = 'article_' . $index;

            // Récupérer le nom du Pokémon à partir de l'URL de l'image
            $imageUrl = $article['image_url'];
            $fileName = basename($imageUrl); // Récupérer le nom du fichier à partir de l'URL
            $fileNameWithoutExtension = pathinfo($fileName, PATHINFO_FILENAME); // Retirer l'extension du fichier
            $pokemonName = ucwords(str_replace('_', ' ', $fileNameWithoutExtension)); // Convertir le nom du fichier en nom de Pokémon

            // Calculer le total de cet article
            $total_article = $article['prix'] * $article['quantite'];
            // Ajouter le total de cet article au total du panier
            $total_panier += $total_article;

            // Affichage de l'article dans le panier avec l'identifiant unique
            echo '<div class="cart-item" id="' . $articleId . '">'; // Ajouter l'identifiant unique comme ID de l'article
            echo '<img src="' . $article['image_url'] . '" alt="Image du produit" class="product-image">';
            echo '<div class="product-details">';
            echo '<h3>' . $pokemonName . '</h3>'; // Afficher le nom du Pokémon
            echo '<p>Taille: ' . $article['taille'] . '</p>';
            echo '<p>Quantité: ' . $article['quantite'] . '</p>';
            echo '<p>Prix: ' . $article['prix'] . '€ TTC</p>';
            echo '<p>Total: ' . $total_article . '€ TTC</p>';
            echo '</div>';
            ?>
            <!-- Formulaire pour supprimer l'article -->
            <form action="/panier/sup_article.php" method="post">
                <input type="hidden" name="articleId" value="<?php echo $index; ?>">
                <button type="submit" class="remove-item">Supprimer</button>
            </form>
            <?php
            echo '</div>';
        } 
        // Afficher le total du panier
        echo '<p>Total du panier : ' . $total_panier . '€ TTC</p>';
    } else {
        echo '<p>Votre panier est vide.</p>';
    }
    ?>
<script src="../assets/JS/sup_article.js"></script>

<?php
require_once __DIR__ . '/../utilities/footer.php';
?>
