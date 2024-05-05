<?php include 'tabinscription.php'; ?>

<link rel="stylesheet" href="/assets/CSS/login.css">
<script defer src="/assets/JS/login.js"></script>
<script defer src="../inscription/regex.js"></script>

<section class="user">
  <div class="user_options-container">
    <div class="user_options-text">
      <div class="user_options-unregistered">
        <h2 class="user_unregistered-title">Rejoignez le Club des Dresseurs Pokémon?</h2>
        <p class="user_unregistered-text">Créez un compte au Club des Dresseurs Pokémon aujourd'hui</p>
        <button class="user_unregistered-signup" id="signup-button">S'inscrire</button>
      </div>

      <div class="user_options-registered">
        <h2 class="user_registered-title">Rejoindre mon Club des Dresseurs!</h2>
        <p class="user_registered-text"></p>
        <button class="user_registered-login" id="login-button">Connexion</button>
      </div>
    </div>

    <div class="user_options-forms" id="user_options-forms">
      <div class="user_forms-login">
        <h2 class="forms_title">Connexion</h2>
        <form class="forms_form" action="/login/log/login.php" method="post">
          <fieldset class="forms_fieldset">
            <div class="forms_field">
              <input type="email" name="email" placeholder="Email" class="forms_field-input" required autofocus />
            </div>
            <div class="forms_field">
              <input type="password" name="password" placeholder="Password" class="forms_field-input" required />
            </div>
          </fieldset>
          <div class="forms_buttons">
            <button type="button" class="forms_buttons-forgot">Mot de passe oublié?</button>
            <input type="submit" value="Log In" class="forms_buttons-action">
          </div>
        </form>
      </div>
      <div class="user_forms-signup">
        <h2 class="forms_title">S'inscrire</h2>
        <form class="forms_form" action="/login/inscription/inscription.php" method="post">
          <fieldset class="forms_fieldset">

            <div class="forms_field"> 
              <input type="text" name="nom_utilisateur" class="form-control" id="input1" required autofocus id="Nom d'utilisateur" placeholder="Nom d'utilisateur">
            </div>

            <div class="forms_field">
              <input type="email" name="email" class="form-control" id="input2" placeholder="Email">  
            </div>

            <div class="forms_field">
              <input type="password" name="password" class="form-control" id="input3" placeholder="Password">  
            </div>

          </fieldset>
          <div class="forms_buttons">
            <input type="submit" value="Sign up" class="forms_buttons-action">
          </div>
        </form>
      </div>

    </div>
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
echo '</div>'; 
echo '</section>'; 
?>