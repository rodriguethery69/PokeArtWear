<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/database.fn.php';


// Fonction pour vérifier si un e-mail est unique dans la base de données
function inscription($config, $email) {
    // Se connecter à la base de données
    $db = getPDOlink($config);

    // Préparer et exécuter la requête SQL
    $stmt = $db->prepare("SELECT COUNT(*) AS count FROM compte WHERE email = ?");
    $stmt->execute([$email]);
    $row = $stmt->fetch();

    // Retourner vrai si l'e-mail est unique, faux sinon
    return $row['count'] == 0;
}

// Fonction pour insérer un nouvel utilisateur dans la base de données
function newUtilisateur($config, $nom_utilisateur, $email, $password) {
    // Se connecter à la base de données
    $db = getPDOlink($config);

    // Hachage du mot de passe
    $password_hache = password_hash($password, PASSWORD_DEFAULT);

    // Insérer le nouvel utilisateur dans la base de données
    $stmt = $db->prepare("INSERT INTO compte (nom_utilisateur, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$nom_utilisateur, $email, $password_hache]);
}
?>

