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

// Vérifier si l'ID du profil à modifier est présent dans la requête GET
if (isset($_GET['id'])) {
    $profile_id = $_GET['id'];

    // Requête pour récupérer les données du profil à modifier
    $sql = "SELECT * FROM client WHERE id_compte = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$profile_id]);
    $profile = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifier si le profil existe
    if ($profile) {
        // Afficher le formulaire pré-rempli avec les données actuelles
    } else {
        echo "Le profil spécifié n'existe pas.";
    }
} else {
    echo "ID de profil non spécifié.";
}
?>


<?php
require_once dirname(__DIR__) . '/../dashboard/utilities/header.php';
?>
<div id="layoutSidenav_content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Modifier votre profil</h5>
                        <form action="/dashboard/Crud/update.php" method="post">
                            <!-- Champ caché pour transmettre l'ID du profil à modifier -->
                            <input type="hidden" name="profile_id" value="<?php echo $profile['id_compte']; ?>">
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom :</label>
                                <input type="text" class="form-control" name="nom" value="<?php echo $profile['nom_client']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="prenom" class="form-label">Prénom :</label>
                                <input type="text" class="form-control" name="prenom" value="<?php echo $profile['prenom_client']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="code_postal" class="form-label">Code Postal :</label>
                                <input type="text" class="form-control" name="code_postal" value="<?php echo $profile['code_postal']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="ville" class="form-label">Ville :</label>
                                <input type="text" class="form-control" name="ville" value="<?php echo $profile['ville']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="adresse_liv" class="form-label">Adresse de livraison :</label>
                                <input type="text" class="form-control" name="adresse_liv_client" value="<?php echo $profile['adresse_liv_client']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="adresse_fac" class="form-label">Adresse de facturation :</label>
                                <input type="text" class="form-control" name="adresse_fac_client" value="<?php echo $profile['adresse_fac_client']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="tel" class="form-label">Téléphone :</label>
                                <input type="tel" class="form-control" name="tel_client" value="<?php echo $profile['tel_client']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email :</label>
                                <input type="email" class="form-control" name="email_client" value="<?php echo $profile['email_client']; ?>">
                            </div>
                            <div class="text-center"> <!-- Centrer le bouton -->
                                <button type="submit" class="btn btn-primary">Modifier le Profil</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 

