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
    $profile_id = $_POST['profile_id'] ?? null;
    $nom = $_POST['nom'] ?? null;
    $prenom = $_POST['prenom'] ?? null;
    $code_postal = $_POST['code_postal'] ?? null;
    $ville = $_POST['ville'] ?? null;
    $adresse_livraison = $_POST['adresse_liv_client'] ?? null;
    $adresse_facturation = $_POST['adresse_fac_client'] ?? null;
    $tel = $_POST['tel_client'] ?? null;
    $email = $_POST['email_client'] ?? null;

    // Valider les données (vous pouvez ajouter vos propres vérifications ici)

    // Assurez-vous que les données requises sont définies avant de mettre à jour le profil
    if ($profile_id && $nom && $prenom && $code_postal && $ville && $adresse_livraison && $adresse_facturation && $tel && $email) {
        // Préparer la requête SQL pour mettre à jour le profil
        $sql = "UPDATE client SET nom_client = ?, prenom_client = ?, code_postal = ?, ville = ?, adresse_liv_client = ?, adresse_fac_client = ?, tel_client = ?, email_client = ? WHERE id_compte = ?";
        $stmt = $pdo->prepare($sql);
        try {
            $stmt->execute([$nom, $prenom, $code_postal, $ville, $adresse_livraison, $adresse_facturation, $tel, $email, $profile_id]);
            // Redirection vers la page de profil avec un message de succès
            header("Location: http://pokeartwear/dashboard/tables.php");
            exit();
        } catch (PDOException $e) {
            // Redirection vers le formulaire avec un message d'erreur si la mise à jour échoue
            header("Location: profil.php?error=update_failed");
            exit();
        }
    } else {
        // Redirection vers le formulaire avec un message d'erreur si des données requises sont manquantes
        header("Location: profil.php?error=missing_data");
        exit();
    }
} else {
    // Redirection vers le formulaire si le formulaire n'a pas été soumis
    header("Location: profil.php");
    exit();
}
?>
