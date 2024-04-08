<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Vérifie si l'utilisateur est connecté
if(isset($_SESSION['user_id'])) {
    // Récupérer le rôle de l'utilisateur à partir de la session ou de la base de données
    $user_role = $_SESSION['user_role'];

    // Afficher le logo avec le lien pour les admins
    if($user_role === 'admin') {
        echo '<a class="navbar-brand" href="/dashboard/index.php">';
        echo '<img src="/assets/logo_connection/admin.png" class="img-fluid" alt="pikachu" width="80" height="80">';
        echo '</a>';
    } else {
        // Afficher le logo sans le lien pour les users
        echo '<img src="/assets/logo_connection/admin.png" class="img-fluid" alt="pikachu" width="80" height="80">';
    }
}
// Affiche le logo dans tout les cas
else {
    echo '<img src="/assets/logo_connection/admin.png" class="img-fluid" alt="pikachu" width="80" height="80">';
}
?>
