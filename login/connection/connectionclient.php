<div class="dropdown" id="loginDropdownContainer">
    <?php
    // Vérifier si la session n'est pas déjà démarrée
    if (!isset($_SESSION)) {
        session_start();
    }

    // Vérifier si l'utilisateur est connecté
    if (isset($_SESSION['user_id'])) 
        // Inclure le fichier de configuration
        require_once __DIR__ . '../../../config/config.php';
        // Inclure le fichier de base de données
        require_once __DIR__ . '../../../function/database.fn.php';

        require_once __DIR__ . '../../../function/utilisateur.fn.php';
       // Vérifier si la session n'est pas déjà démarrée
        if (!isset($_SESSION)) {
            session_start();
                }

        // Vérifier si l'utilisateur est connecté
        if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $user_name = utilisateurs($config, $user_id);
        // Afficher le lien de profil et le texte de bienvenue
        echo '<a class="navbar-brand login-toggle dropdown-toggle" href="#" id="loginDropdown" role="button" aria-expanded="false">';
        echo '<img src="/assets/logo_connection/connecter.png" class="img-fluid" alt="logo profil" width="40" height="40">';
        echo '</a>';
        echo '<ul class="dropdown-menu" aria-labelledby="loginDropdown">';
        echo '<li><span class="dropdown-item">Bienvenue, ' . $user_name . ' !</span></li>';
        echo '<hr class="dropdown-divider">';
        echo '<li><a class="dropdown-item" href="/profils/profil.php">Mon Profil</a></li>';
        echo '<li><a class="dropdown-item" href="/parametres.php">Paramètres</a></li>';
        echo '<li><hr class="dropdown-divider"></li>';
        echo '<li><a class="dropdown-item" href="/login/log/logout.php">Déconnexion</a></li>';
        echo '</ul>';
    } else {
        // Afficher le lien de connexion standard
        echo '<a class="navbar-brand login-toggle dropdown-toggle" href="/../login/connection/connexion.php" id="loginDropdown" role="button" aria-expanded="false">';
        echo '<img src="/assets/logo_connection/profil.png" class="img-fluid" alt="logo profil" width="40" height="40">';
        echo '</a>';
    }
    ?>
    <!-- logo panier -->
    <a class="navbar-brand" href="#">
        <img src="/assets/panier/panier.png" class="img-fluid" alt="logo panier" width="50" height="50">
    </a>
</div>
