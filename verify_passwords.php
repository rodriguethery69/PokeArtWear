<?php
// Inclure le fichier de configuration
require_once __DIR__ . ('/config/config.php');
// Inclure le fichier de base de données
require_once __DIR__ . ('/function/database.fn.php');

// Obtenez une connexion PDO à la base de données
$db = getPDOlink($config);

// Requête SQL pour sélectionner les mots de passe
$stmt = $db->query("SELECT password FROM users");

// Parcourez les résultats et vérifiez les hachages des mots de passe
while ($row = $stmt->fetch()) {
    $password = $row['password'];
    $isHashed = password_verify('thery', $password); // Remplacez 'mot_de_passe' par le mot de passe à vérifier
    echo "Mot de passe haché : " . ($isHashed ? "Oui" : "Non") . "<br>";
}
?>
