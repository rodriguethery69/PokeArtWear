<?php
// Inclure les fichiers de configuration et de fonctions

require_once __DIR__ . ('/../utilities/header.php');

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../function/database.fn.php';

// Vérifier si une session est déjà active
if (session_status() === PHP_SESSION_NONE) {
    // Si aucune session n'est active, démarrer une nouvelle session
    session_start();
}

// Obtenez une connexion PDO à la base de données
$pdo = getPDOlink($config);

// Vérifier si l'ID du profil à modifier est présent dans la requête GET
if(isset($_GET['id'])) {
    $profile_id = $_GET['id'];

    // Requête pour récupérer les données du profil à modifier
    $sql = "SELECT * FROM client WHERE id_compte = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$profile_id]);
    $profile = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifier si le profil existe
    if($profile) {
        // Afficher le formulaire pré-rempli avec les données actuelles
        ?>
        <form action="update.php" method="post">
            <!-- Champ caché pour transmettre l'ID du profil à modifier -->
            <input type="hidden" name="profile_id" value="<?php echo $profile_id; ?>">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" value="<?php echo $profile['nom']; ?>"><br>
            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" value="<?php echo $profile['prenom']; ?>"><br>
            <!-- Ajoutez d'autres champs de formulaire pour les autres données du profil -->
            <button type="submit">Enregistrer les modifications</button>
        </form>
        <?php
    } else {
        echo "Le profil spécifié n'existe pas.";
    }
} else {
    echo "ID de profil non spécifié.";
}
?>

<?php
require_once __DIR__ . ('/../utilities/footer.php');
?>
