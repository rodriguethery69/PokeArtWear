<?php
// Démarrer la session
session_start();

// Vérifier si la méthode de requête est POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier si l'identifiant de l'article à supprimer a été envoyé
    if (isset($_POST['articleId'])) {
        $articleId = $_POST['articleId'];

        // Vérifier si le panier existe dans la session et s'il contient l'article à supprimer
        if (isset($_SESSION['panier']) && isset($_SESSION['panier'][$articleId])) {
            // Supprimer l'article du panier en utilisant son identifiant
            unset($_SESSION['panier'][$articleId]);

            // Définir un message de succès dans la session
            $_SESSION['success_message'] = "L'article a été supprimé avec succès.";

            // Répondre avec un message de succès
            header('Location: http://pokeartwear/panier/panier.php');
            exit;
        } else {
            // Répondre avec un message d'erreur si l'article n'a pas été trouvé dans le panier
            $response = array('success' => false, 'message' => 'L\'article n\'a pas été trouvé dans le panier.');
            echo json_encode($response);
            exit;
        }
    } else {
        // Répondre avec un message d'erreur si l'identifiant de l'article n'a pas été fourni
        $response = array('success' => false, 'message' => 'L\'identifiant de l\'article n\'a pas été fourni.');
        echo json_encode($response);
        exit;
    }
} else {
    // Répondre avec un message d'erreur si la méthode de requête n'est pas POST
    $response = array('success' => false, 'message' => 'La méthode de requête doit être POST.');
    echo json_encode($response);
    exit;
}
?>
