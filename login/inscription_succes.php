<?php require_once __DIR__ . '../../utilities/header.php'; ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="/assets/CSS/cards.css">


<div class="cards__container">
    <div class="card">
        <div class="card__thumb rounded-2"><img class="img-fluid" src="/assets/accueil/bienvenue.jpg" /></div>
        <div class="card__content rounded-2">
            <h3 class="card__title">Inscription réussie</h3>
            <p class="card__text">Votre compte a été créé avec succès. Vous pouvez maintenant vous connecter.</p>
            <a button type="button" class="btn btn-dark btn-lg" href="../index.php">Retour à l'accueil</button></a>
        </div>
    </div>
</div>

<?php
require_once __DIR__ . '../../utilities/footer.php';
?>