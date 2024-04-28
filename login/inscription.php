<?php
require_once '../config/config.php';
require_once '../function/database.fn.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si tous les champs sont renseignés
    if (isset($_POST['nom_utilisateur'], $_POST['email'], $_POST['password'])) {
        // Récupérer et nettoyer les valeurs des champs
        $nom_utilisateur = htmlspecialchars($_POST['nom_utilisateur']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        // Vérifier si l'e-mail est unique
        $db = getPDOlink($config);
        $stmt = $db->prepare("SELECT COUNT(*) AS count FROM compte WHERE email = ?");
        $stmt->execute([$email]);
        $row = $stmt->fetch();
        if ($row['count'] > 0) {
            $error = "L'e-mail est déjà utilisé.";
        } else {
            // Hachage du mot de passe
            $password_hache = password_hash($password, PASSWORD_DEFAULT);

            // Insérer le nouvel utilisateur dans la base de données
            $stmt = $db->prepare("INSERT INTO compte (nom_utilisateur, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$nom_utilisateur, $email, $password_hache]);

            // Redirection vers la page de succès
            header("Location: http://pokeartwear/login/inscription_succes.php");
            exit();
        }
    } else {
        // Tous les champs ne sont pas renseignés, afficher un message d'erreur
        $error = "Veuillez remplir tous les champs.";
    }
} else {
    // Redirection vers la page d'inscription si le formulaire n'a pas été soumis
    header("Location: inscription.php");
    exit();
}
