<!DOCTYPE html>
<html lang="fr-FR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/orejime@2.2.1/dist/orejime.css" />
    <script src="https://unpkg.com/orejime@2.2.1/dist/orejime.js"></script>

    <link rel="stylesheet" href="/style.css">
    <script defer src="/header.js"></script>
    <script defer src="/cookies/orejime-config.js"></script>
    <title>PokeArtWear</title>
</head>
<body>
    <!-- haut de la page -->
    <header>
    <div id="orejime"></div>
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
                            <?php require_once dirname(__DIR__) . "/acces.php";?>
                            <a class="navbar-brand" href="/index.php">
                                <img src="/assets/logo/accueil.png" class="img-fluid" alt="logo maison" width="50" height="50">
                            </a>
                        </div>
                        <ul class="navbar-nav gap-1">
                            <?php require_once dirname(__DIR__) . "/accueil/navphp/navbar.php"; ?>
                        </ul>
                        <?php require_once dirname(__DIR__) . "/connectionclient.php"; ?>
                    </div>
                </div>
            </nav>
        </section>
    </header>
    <div id="orejime"></div>
    <main>