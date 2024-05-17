<?php
// Démarrez la session
session_start();

// Détruisez toutes les variables de session
$_SESSION = array();

session_unset();

// Détruisez la session
session_destroy();

// Redirigez l'utilisateur vers la page de connexion ou une autre page de votre choix
header("Location: http://pokeartwear/index.php");
exit();