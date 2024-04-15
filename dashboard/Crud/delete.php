<?php
require_once dirname(__DIR__) . '/../config/config.php';
require_once dirname(__DIR__) . '/../function/database.fn.php';

// Vérifier si l'ID du profil à supprimer est présent dans la requête GET
if (isset($_GET['id'])) {
    $profile_id = $_GET['id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Traitement de la suppression
        $pdo = getPDOlink($config);
        
        // Requête SQL pour supprimer le profil
        $sql = "DELETE FROM client WHERE id_compte = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$profile_id]);

        // Redirection vers la page de table après la suppression
        header("Location: http://pokeartwear/dashboard/tables.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation de suppression</title>
</head>
<body>
    <h1>Confirmation de suppression</h1>
    <p>Êtes-vous sûr de vouloir supprimer ce profil ?</p>
    <form action="delete.php?id=<?php echo $profile_id; ?>" method="post">
        <button type="submit">Confirmer la suppression</button>
        <a href="table.php">Annuler</a>
    </form>
</body>
</html>

