<?php
// Inclure le fichier de configuration
require_once __DIR__ . '/config/config.php';
// Inclure le fichier de base de données
require_once __DIR__ . '/function/database.fn.php';

// Obtenez une connexion PDO à la base de données
$db = getPDOlink($config);

// Sélectionnez les utilisateurs et leurs mots de passe non hachés
$stmt = $db->query("SELECT id, password FROM users");

// Parcourir les résultats
while ($row = $stmt->fetch()) {
    $userId = $row['id'];
    $password = $row['password'];
    
    // Vérifier si le mot de passe n'est pas déjà haché
    if (!password_verify($password, $password)) {
        // Hacher le mot de passe
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Mettre à jour le mot de passe dans la base de données
        $updateStmt = $db->prepare("UPDATE users SET password = :password WHERE id = :id");
        $updateStmt->bindParam(':password', $hashedPassword);
        $updateStmt->bindParam(':id', $userId);
        $updateStmt->execute();

        echo "Mot de passe mis à jour pour l'utilisateur $userId <br>";
    } else {
        echo "Le mot de passe pour l'utilisateur $userId est déjà haché <br>";
    }
}

echo "Terminé";
?>
