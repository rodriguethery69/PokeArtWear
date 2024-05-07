<?php
require_once __DIR__ . ('/../utilities/header.php');
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
    // Vérifier si le panier existe dans la session
    if (isset($_SESSION['panier']) && !empty($_SESSION['panier'])) {
        // Afficher chaque article du panier
        foreach ($_SESSION['panier'] as $article) {
            echo '<div class="cart-item">';
            echo '<img src="' . $article['image_url'] . '" alt="Image du produit" class="product-image">';
            echo '<div class="product-details">';
            echo '<h3>Nom du produit</h3>';
            echo '<p>Taille: ' . $article['taille'] . '</p>';
            echo '<p>Quantité: ' . $article['quantite'] . '</p>';
            echo '<p>Prix: ' . $article['prix'] . '€ TTC</p>';
            $total_article = $article['prix'] * $article['quantite'];
            echo '<p>Total: ' . $total_article . '€ TTC</p>';
            echo '</div>';
            echo '<button class="remove-item">Supprimer</button>';
            echo '</div>';
        }
    } else {
        echo '<p>Votre panier est vide.</p>';
    }
    ?>


<?php
require_once __DIR__ . ('/../utilities/footer.php');
