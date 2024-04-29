<?php
// Inclure le fichier de configuration
require_once '../../config/config.php';
// Inclure le fichier de base de données
require_once '../../function/database.fn.php';


// Vérifier si le formulaire de connexion a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si tous les champs sont renseignés
    if (isset($_POST['email'], $_POST['password'])) {
        // Récupérer les valeurs des champs
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        // Obtenez une connexion PDO à la base de données
        $db = getPDOlink($config);

        // Requête SQL pour sélectionner l'utilisateur avec l'e-mail fourni
        $stmt = $db->prepare("SELECT id, email, password FROM compte WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        // Vérifier si un utilisateur correspondant a été trouvé
        if ($user) {
            // Utilisateur trouvé dans la base de données, vérifier le mot de passe
            if (password_verify($password, $user['password'])) {
                // Mot de passe correct, rediriger l'utilisateur vers la page de profil ou le tableau de bord
                session_start();
                $_SESSION['user_id'] = $user['id']; // Stocker l'ID de l'utilisateur dans la session

                // Inclure le fichier pour récupérer le rôle de l'utilisateur
                require_once 'user_role.php';

                header("Location: http://pokeartwear/index.php");
                exit();
            } else {
                // Mot de passe incorrect, afficher un message d'erreur
                $error = "Mot de passe incorrect.";
            }
        } else {
            // Aucun utilisateur trouvé avec cet e-mail, afficher un message d'erreur
            $error = "Aucun utilisateur trouvé avec cet e-mail.";
        }
    } else {
        // Tous les champs ne sont pas renseignés, afficher un message d'erreur
        $error = "Veuillez remplir tous les champs.";
    }
} else {
    // Redirection vers la page de connexion si le formulaire n'a pas été soumis
    header("Location: connexion.php");
    exit();
}
?>
