<?php
// Inclure les fichiers de configuration et de fonctions
require_once dirname(__DIR__) . '/../config/config.php';
require_once dirname(__DIR__) . '/../function/database.fn.php';

// Vérifier si une session est déjà active
if (session_status() === PHP_SESSION_NONE) {
    // Si aucune session n'est active, démarrer une nouvelle session
    session_start();
}

// Obtenez une connexion PDO à la base de données
$pdo = getPDOlink($config);

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $id_compte = $_POST['id_compte'];
    $nom_client = $_POST['nom_client'];
    $prenom_client = $_POST['prenom_client'];
    $code_postal = $_POST['code_postal'];
    $ville = $_POST['ville'];
    $adresse_liv_client = $_POST['adresse_liv_client'];
    $adresse_fac_client = $_POST['adresse_fac_client'];
    $tel_client = $_POST['tel_client'];
    $email_client = $_POST['email_client'];

    // Requête SQL pour insérer les données dans la table client
    $sql = "INSERT INTO client (id_compte, nom_client, prenom_client, code_postal, ville, adresse_liv_client, adresse_fac_client, tel_client, email_client) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_compte, $nom_client, $prenom_client, $code_postal, $ville, $adresse_liv_client, $adresse_fac_client, $tel_client, $email_client]);

    // Rediriger vers une page de confirmation ou une autre page après l'insertion
    header("Location: confirmation.php");
    exit;
}
