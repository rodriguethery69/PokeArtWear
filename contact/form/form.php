<?php include 'tabimg.php'; ?>

<link rel="stylesheet" href="/assets/CSS/form.css">
<script defer src="./form.js"></script>
<script defer src="https://smtpjs.com/v3/smtp.js"></script>

<div id="success-message" style="display: none;" class="alert alert-success">Le courriel a été envoyé avec succès !</div>

<section>
  <div class="container">
  <form action="rodriguethery@gmail.com" class id="contact">
      <h3>Contactez-Nous</h3>

      <fieldset>
        <label for="input1">Nom:</label>
        <input type="text" class="form-control" id="input1" required autofocus id="nom" placeholder="Nom">
        <div class="invalid-feedback">Veuillez entrer un nom valide.</div>
        <div class="valid-feedback">Champs Valide.</div>
      </fieldset>

      <fieldset>
        <label for="input2">Email:</label>
        <input type="email" class="form-control" id="input2" placeholder="Email">
        <div class="invalid-feedback">Veuillez entrer une adresse email valide.</div>
        <div class="valid-feedback">Champs Valide.</div>
      </fieldset>

      <fieldset>
        <label for="input3">Téléphone:</label>
        <input type="tel" class="form-control" id="input3" placeholder="Téléphone">
        <div class="invalid-feedback">Veuillez entrer un numéro de téléphone valide.</div>
        <div class="valid-feedback">Champs Valide.</div>
      </fieldset>

      <fieldset>
        <label for="input4">Sujet:</label>
        <input type="texte" class="form-control" id="input4" placeholder="Sujet">
        <div class="invalid-feedback">Veuillez entrer un sujet valide.</div>
        <div class="valid-feedback">Champs Valide.</div>
      </fieldset>

      <fieldset>
        <label for="Textarea1">Message:</label>
        <textarea class="form-control" id="Textarea1" placeholder="Message...."></textarea>
        <div class="invalid-feedback">Veuillez entrer un message valide.</div>
        <div class="valid-feedback">Champs Valide.</div>
      </fieldset>

      <fieldset>
        <input class="btn btn-danger" type="submit" >
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
