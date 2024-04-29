<?php

// Récupérer l'ID de l'utilisateur depuis la session
$user_id = $_SESSION['user_id'];

// Requête SQL pour récupérer le rôle de l'utilisateur
$stmt_role = $db->prepare("SELECT role FROM compte WHERE id = ?");
$stmt_role->execute([$user_id]);
$role = $stmt_role->fetchColumn();

// Vérifier si le rôle a été récupéré avec succès
if ($role) {
    // Stocker le rôle dans une variable de session ou toute autre structure de données
    $_SESSION['user_role'] = $role;
} else {
    // Gérer le cas où le rôle n'a pas été récupéré
    // Peut-être afficher un message d'erreur ou rediriger l'utilisateur vers une page d'erreur
}