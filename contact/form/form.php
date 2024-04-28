<?php include 'tabimg.php'; ?>

<link rel="stylesheet" href="/assets/CSS/form.css">

<section>
  <div class="container">
    <form id="contact" action="traitement.php" method="post">
      <h3>Contactez-Nous</h3>
      <fieldset>
        <label for="nom">Nom:</label>
        <input placeholder="Nom" type="text" tabindex="1" required autofocus id="nom" name="nom">
      </fieldset>
      <fieldset>
        <label for="email">Email:</label>
        <input placeholder="Email" type="email" tabindex="2" required id="email" name="email">
      </fieldset>
      <fieldset>
        <label for="telephone">Téléphone:</label>
        <input placeholder="Téléphone" type="tel" tabindex="3" required id="telephone" name="telephone">
      </fieldset>
      <fieldset>
        <label for="message">Message:</label>
        <textarea placeholder="Message...." tabindex="5" required id="message" name="message"></textarea>
      </fieldset>
      <fieldset>
        <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Envoyer</button>
      </fieldset>
    </form>
  </div>
</section>


<?php
// Boucle à travers chaque élément du tableau $imgs
echo '<section class="container-md m-auto">';
echo '<div class="row col-md-10 gap-5 mb-5 m-auto">';
foreach ($imgs as $value) {
    echo '
    <div class="col">
        <div class="card">
            <img src="' . $value['img'] . '" class="card-img" alt="' . $value['alt'] . '">
        </div>
    </div>';
}
echo '</div>'; // Fermeture de la div "row"
echo '</section>'; // Fermeture de la section "container-md m-auto"
?>

           
<script  src="/assets/JS/form.js"></script>
