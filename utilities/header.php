<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <script defer src="/header.js"></script>
    <title>PokeArtWear</title>
</head>

<body>
    <!-- haut de la page -->
    <header>
        <section>
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <!-- menu burger responsive -->
                    <a class="navbar-brand" href="#"></a>
                    <button class="navbar-toggler border border-danger" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class=><img src="/assets/logo/logo.png" class="img-fluid" alt="logo pokeball" width="70" height="70"></span>
                        <!-- navbar -->
                    </button>
                    <div class="collapse navbar-collapse fs-4 fw-semibold justify-content-around" id="navbarNav">
                        <!-- logo gauche -->
                        <div>
                        <?php require_once "acces.php"; ?>
                            <a class="navbar-brand" href="/index.php">
                                <img src="/assets/logo/logo.png" class="img-fluid" alt="logo pokeball" width="90" height="90">
                            </a>
                        </div>
                        <ul class="navbar-nav gap-1">
                            <?php require_once dirname(__DIR__) . "/accueil/navphp/navbar.php"; ?>
                        </ul>
                        <div class="dropdown" id="loginDropdownContainer">
                            <a class="navbar-brand login-toggle dropdown-toggle" href="#" id="loginDropdown" role="button" aria-expanded="false">
                                <img src="/assets/logo_connection/connection.png" class="img-fluid" alt="logo login" width="90" height="90">
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="loginDropdown">
                                <!-- Ajoutez des liens ou des options ici -->
                                <li><a class="dropdown-item" href="/connexion.php">Connexion</a></li>
                                    <hr class="dropdown-divider">
                                <li><a class="dropdown-item" href="/profil.php">Mon Profil</a></li>
                                <li><a class="dropdown-item" href="/parametres.php">Paramètres</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="/login/logout.php">Déconnexion</a></li>
                            </ul>
                            <!-- logo panier -->
                            <a class="navbar-brand" href="#">
                                <img src="/assets/panier/panier.png" class="img-fluid" alt="logo panier" width="90" height="90">
                            </a>
                        </div>
                    </div>
                </div>
            </nav>
        </section>
    </header>
    <main>