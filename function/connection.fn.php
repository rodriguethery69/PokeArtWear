<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/database.fn.php';

function connection($config, $user_id) {
    // Obtenez une connexion PDO à la base de données
    $db = getPDOlink($config);

    // Requête SQL pour sélectionner le nom de l'utilisateur
    $stmt_name = $db->prepare("SELECT nom_utilisateur FROM compte WHERE id = ?");
    $stmt_name->execute([$user_id]);
    $user_name = $stmt_name->fetchColumn();

    return $user_name;
}

