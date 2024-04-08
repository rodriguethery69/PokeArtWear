<?php

// Démarrer la session
session_start();

// Inclure les fichiers de configuration et de fonctions
require_once '../config/config.php';
require_once '../function/database.fn.php';

$pdo = getPDOlink($config);

// Vérifier si l'utilisateur est connecté et si la clé 'user_id' est définie
if (!isset($_SESSION['user_id'])) {
    // Redirection vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: login.php");
    exit();
} else {
    // Récupérer l'ID du compte de la session
    $id_compte = $_SESSION['user_id'];
    echo "L'utilisateur est connecté avec l'ID du compte : " . $id_compte;
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

    // Assurez-vous que les données requises sont définies avant d'insérer dans la base de données
    if ($id_compte && $nom_client && $prenom_client && $code_postal && $ville && $adresse_liv_client && $adresse_fac_client && $tel_client && $email_client) {
        // Préparer la requête SQL d'insertion dans la table client
        $sql = "INSERT INTO client (id_compte, nom_client, prenom_client, code_postal, ville, adresse_liv_client, adresse_fac_client, tel_client, email_client) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        try {
            $stmt->execute([$id_compte, $nom_client, $prenom_client, $code_postal, $ville, $adresse_liv_client, $adresse_fac_client, $tel_client, $email_client]);
            // Redirection vers la page de profil avec un message de succès
            header("Location: http://pokeartwear/profils/profil_create.php");
            exit();
        } catch (PDOException $e) {
            // Redirection vers le formulaire avec un message d'erreur si l'insertion échoue
            header("Location: formulaire_profil.php?error=sql_error");
            exit();
        }
    } else {
        // Redirection vers le formulaire avec un message d'erreur si des données requises sont manquantes
        header("Location: formulaire_profil.php?error=missing_data");
        exit();
    }
} else {
    // Redirection vers le formulaire si le formulaire n'a pas été soumis
    header("Location: formulaire_profil.php");
    exit();
}
