<?php
// Démarrer la session
session_start();

// Inclure les fichiers de configuration et de fonctions
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../function/database.fn.php';

// Vérifier si une session est déjà active
if (session_status() === PHP_SESSION_NONE) {
    // Si aucune session n'est active, démarrer une nouvelle session
    session_start();
}

// Obtenez une connexion PDO à la base de données
$pdo = getPDOlink($config);

// Vérifier si l'utilisateur est connecté et si la clé 'user_id' est définie
if (!isset($_SESSION['user_id'])) {
    // Redirection vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: login.php");
    exit();
} else {
    // Récupérer l'ID du compte de la session
    $id_compte = $_SESSION['user_id'];
}

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $nom_client = $_POST['nom_client'] ?? null;
    $prenom_client = $_POST['prenom_client'] ?? null;
    $code_postal = $_POST['code_postal'] ?? null;
    $ville = $_POST['ville'] ?? null;
    $adresse_liv_client = $_POST['adresse_liv_client'] ?? null;
    $adresse_fac_client = $_POST['adresse_fac_client'] ?? null;
    $tel_client = $_POST['tel_client'] ?? null;
    $email_client = $_POST['email_client'] ?? null;

    // Assurez-vous que les données requises sont définies avant de mettre à jour le profil
    if ($nom_client && $prenom_client && $code_postal && $ville && $adresse_liv_client && $adresse_fac_client && $tel_client && $email_client) {
        // Préparer la requête SQL pour mettre à jour le profil existant
        $sql = "UPDATE client SET nom_client = ?, prenom_client = ?, code_postal = ?, ville = ?, adresse_liv_client = ?, adresse_fac_client = ?, tel_client = ?, email_client = ? WHERE id_compte = ?";
        $stmt = $pdo->prepare($sql);
        try {
            $stmt->execute([$nom_client, $prenom_client, $code_postal, $ville, $adresse_liv_client, $adresse_fac_client, $tel_client, $email_client, $id_compte]);
            // Après avoir effectué la mise à jour avec succès
            $_SESSION['success_message'] = "Votre profil a été mis à jour avec succès";
            // Redirection vers la page de profil avec un message de succès
            header("Location: http://pokeartwear/profil.php");
            exit();
        } catch (PDOException $e) {
            // Redirection vers le formulaire avec un message d'erreur si la mise à jour échoue
            header("Location: profil.php?error=update_failed");
            exit();
        }
    } else {
        // Redirection vers le formulaire avec un message d'erreur si des données requises sont manquantes
        header("Location: profil.php?error=missing_data");
        exit();
    }
} else {
    // Redirection vers le formulaire si le formulaire n'a pas été soumis
    header("Location: profil.php");
    exit();
}

?>


