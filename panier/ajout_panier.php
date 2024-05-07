<?php

require_once __DIR__ . '../../config/config.php';
require_once __DIR__ . '../../function/database.fn.php';

// Assurez-vous que la session est démarrée pour pouvoir accéder aux variables de session
session_start();

// Vérifiez si des données ont été envoyées depuis la page de personnalisation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifiez si les données requises sont présentes
    if (isset($_POST['image_url']) && isset($_POST['taille']) && isset($_POST['quantite']) && isset($_POST['prix'])) {
        // Récupérez les données envoyées depuis la page de personnalisation
        $imageUrl = $_POST['image_url'];
        $taille = $_POST['taille'];
        $quantite = $_POST['quantite'];
        $prix = $_POST['prix'];

        // Calculez le total
        $total = $prix * $quantite;

        // Créez un tableau représentant un article à ajouter au panier
        $article = array(
            'image_url' => $imageUrl,
            'taille' => $taille,
            'quantite' => $quantite,
            'prix' => $prix,
            'total' => $total,
        );

        // Vérifie si le panier existe dans la session
        if (!isset($_SESSION['panier'])) {
            // Si le panier n'existe pas, créez-le et ajoutez l'article
            $_SESSION['panier'] = array($article);
        } else {
            // Par défaut, supposons que l'article n'existe pas encore dans le panier
            $articleExists = false;

            // Parcourez chaque article dans le panier pour vérifier s'il existe déjà un article identique
            foreach ($_SESSION['panier'] as &$item) {
                if ($item['image_url'] === $article['image_url'] && $item['taille'] === $article['taille']) {
                    // Si un article identique est trouvé, mettez à jour la quantité
                    $item['quantite'] += $article['quantite'];
                    $articleExists = true;
                    break; // Sortez de la boucle car l'article a été trouvé
                }
            }

            // Si l'article n'existe pas encore dans le panier, ajoutez-le
            if (!$articleExists) {
                $_SESSION['panier'][] = $article;
            }
        }

        // Réponse pour indiquer que l'article a été ajouté au panier avec succès
        echo json_encode(array('success' => true, 'message' => 'Article ajouté au panier.'));
        exit; // Arrêtez l'exécution du script après avoir envoyé la réponse JSON
    } else {
        // Si des données requises sont manquantes, renvoyez une erreur
        echo json_encode(array('success' => false, 'message' => 'Données manquantes.'));
        exit; // Arrêtez l'exécution du script après avoir envoyé la réponse JSON
    }
} else {
    // Si la méthode de requête n'est pas POST, renvoyez une erreur
    echo json_encode(array('success' => false, 'message' => 'Méthode de requête non autorisée.'));
    exit; // Arrêtez l'exécution du script après avoir envoyé la réponse JSON
}
