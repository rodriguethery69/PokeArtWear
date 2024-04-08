<?php
// Inclure les fichiers de configuration et de fonctions
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../function/database.fn.php';

// Vérifier si une session est déjà active
if (session_status() === PHP_SESSION_NONE) {
    // Si aucune session n'est active, démarrer une nouvelle session
    session_start();
}

// Obtenez une connexion PDO à la base de données
$pdo = getPDOlink($config);

// Vérifier si l'utilisateur est connecté et si la clé 'user_id' est définie
if (!isset($_SESSION['user_id'])) {
    // Redirection vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: login.php");
    exit();
} else {
    // Récupérer l'ID du compte de la session
    $id_compte = $_SESSION['user_id'];
}

// Requête pour obtenir les informations du profil de l'utilisateur
$sql = "SELECT * FROM client WHERE id_compte = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id_compte]);
$profile = $stmt->fetch(PDO::FETCH_ASSOC);

// Vérifier si le profil existe
if ($profile) {
    // Le profil existe, afficher les informations du profil
    // Utilisez les données du profil pour pré-remplir le formulaire
    $nom_client = $profile['nom_client'];
    $prenom_client = $profile['prenom_client'];
    $code_postal = $profile['code_postal'];
    $ville = $profile['ville'];
    $adresse_liv_client = $profile['adresse_liv_client'];
    $adresse_fac_client = $profile['adresse_fac_client'];
    $tel_client = $profile['tel_client'];
    $email_client = $profile['email_client'];
} else {
    // Le profil n'existe pas, rediriger vers le formulaire de création de profil
    header("Location: http://pokeartwear/profils/formulaire_profil.php");
    exit();
}

// Vérifier si la variable de session success_message existe
if (isset($_SESSION['success_message'])) {
    // Afficher le message de succès
    echo "<div class='alert alert-success'>" . $_SESSION['success_message'] . "</div>";
    // Une fois le message affiché, vous pouvez le supprimer de la session pour qu'il ne s'affiche qu'une seule fois
    unset($_SESSION['success_message']);
}
?>


<link rel="stylesheet" href="/assets/CSS/profil.css">
<section>
    <div class="container">
        <form id="profile" action="/profils/update_profil.php" method="post">
            <h3>Modifier votre profil</h3>
            <!-- Utilisez les variables du profil pour pré-remplir les champs du formulaire -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nom">Nom :</label>
                        <input placeholder="Nom" type="text" tabindex="1" required autofocus id="nom_client" name="nom_client" class="form-control" value="<?php echo $nom_client; ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="prenom">Prénom :</label>
                        <input placeholder="Prénom" type="text" tabindex="2" required id="prenom_client" name="prenom_client" class="form-control" value="<?php echo $prenom_client; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="code_postale">Code Postal :</label>
                    <input placeholder="Code Postal" type="text" tabindex="3" required id="code_postal" name="code_postal" class="form-control" value="<?php echo $code_postal; ?>">
                </div>
                <div class="form-group">
                    <label for="ville">Ville :</label>
                    <input placeholder="Ville" type="text" tabindex="4" required id="ville" name="ville" class="form-control" value="<?php echo $ville; ?>">
                </div>
                <div class="form-group">
                    <label for="adresse_liv">Adresse de livraison :</label>
                    <input placeholder="Adresse de livraison" type="text" tabindex="5" required id="adresse_liv_client" name="adresse_liv_client" class="form-control" value="<?php echo $adresse_liv_client; ?>">
                </div>
                <div class="form-group">
                    <label for="adresse_fac">Adresse de facturation :</label>
                    <input placeholder="Adresse de facturation" type="text" tabindex="6" required id="adresse_fac_client" name="adresse_fac_client" class="form-control" value="<?php echo $adresse_fac_client; ?>">
                </div>
                <div class="form-group">
                    <label for="telephone">Téléphone :</label>
                    <input placeholder="Téléphone" type="tel" tabindex="8" required id="tel_client" name="tel_client" class="form-control" value="<?php echo $tel_client; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input placeholder="Email" type="email" tabindex="7" required id="email_client" name="email_client" class="form-control" value="<?php echo $email_client; ?>">
                </div>
                <button name="submit" type="submit" id="contact-submit" class="btn btn-primary" data-submit="...En Cours">Enregistrer les modifications</button>
            </div>
        </form>
    </div>
</section>