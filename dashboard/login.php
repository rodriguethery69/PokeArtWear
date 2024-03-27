<?php

// Inclure le fichier de configuration
require_once '../config/config.php';
// Inclure le fichier de base de données
require_once '../function/database.fn.php';

// Vérifiez si le formulaire a été soumis
// Vérifiez si le formulaire a été soumis et que les champs ne sont pas vides
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['email']) && !empty($_POST['password'])) {
    // Le formulaire a été soumis avec des valeurs pour email et mot de passe, traitez les données de connexion

    var_dump($_POST);
    // Vérifiez si les champs email et mot de passe sont définis et non vides
    if (isset($_POST['email'], $_POST['password']) && !empty($_POST['email']) && !empty($_POST['password'])) {


        // Obtenez une connexion PDO à la base de données
        $db = getPDOlink($config);

        // Récupérer les valeurs des champs email et mot de passe
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Requête SQL pour sélectionner l'enregistrement correspondant à l'email fourni
        $stmt = $db->prepare("SELECT id, email, password FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch();

        var_dump($user);

        // Vérifier si un utilisateur correspondant a été trouvé
        if ($user) {
            // Utilisateur trouvé dans la base de données
            if (password_verify($password, $user['password'])) {
                // Préparez la requête SQL pour mettre à jour la colonne last_login
                $updateStmt = $db->prepare("UPDATE users SET last_login = NOW() WHERE id = :user_id");
                // Exécutez la requête en liant le paramètre user_id
                $updateStmt->execute(['user_id' => $user['id']]);

                // Mot de passe correct, redirection vers le tableau de bord
                session_start();
                $_SESSION['user_id'] = $user['id']; // Stocker l'ID de l'utilisateur dans la session
                header("Location: http://pokeartwear/dashboard/index.html");
                exit();
            } else {
                // Mot de passe incorrect
                $error = "Mot de passe incorrect.";
            }
        } else {
            // Aucun utilisateur trouvé avec cet email
            $error = "Utilisateur non trouvé.";
        }
    } else {
        // Les champs email et/ou mot de passe ne sont pas renseignés, afficher un message d'erreur ou rediriger vers la page de connexion avec un message d'erreur
        $error = "Veuillez saisir une adresse e-mail et un mot de passe.";
    }
} else {
    // Les champs email et/ou mot de passe sont vides, afficher un message d'erreur ou rediriger vers la page de connexion avec un message d'erreur
    $error = "Veuillez saisir une adresse e-mail et un mot de passe.";
}
