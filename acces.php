<?php
session_start();

// Vérifier si l'utilisateur est connecté
if(isset($_SESSION['user_id'])) {
    // Récupérer le rôle de l'utilisateur à partir de la session ou de la base de données
    $user_role = $_SESSION['user_role']; // C'est un exemple, vous devrez peut-être ajuster cela en fonction de votre implémentation réelle

    // Affichage conditionnel du lien vers la page users en fonction du rôle de l'utilisateur
    if($user_role === 'admin') {
        echo '<a class="navbar-brand" href="/dashboard/login.html">';
        echo '<img src="/assets/logo_connection/admin.png" class="img-fluid" alt="pikachu" width="90" height="90">';
        echo '</a>';
    } else {
        // Afficher seulement le logo sans lien pour les utilisateurs non-administrateurs
        echo '<img src="/assets/logo_connection/admin.png" class="img-fluid" alt="pikachu" width="90" height="90">';
    }
}
// Toujours afficher le logo, même si l'utilisateur n'est pas connecté
else {
    echo '<img src="/assets/logo_connection/admin.png" class="img-fluid" alt="pikachu" width="90" height="90">';
}
?>
