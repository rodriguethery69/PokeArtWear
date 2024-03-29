<link href="https://fonts.googleapis.com/css?family=Montserrat:300, 400, 500" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="/assets/CSS/login.css">
<script defer src="/assets/JS/login.js"></script>

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
        <form class="forms_form" action="/login/login.php" method="post">
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
        <form class="forms_form" action="/login/inscription.php" method="post">
          <fieldset class="forms_fieldset">
            <div class="forms_field">
              <input type="text" name="nom_utilisateur" placeholder="Nom d'utilisateur" class="forms_field-input" required />
            </div>
            <div class="forms_field">
              <input type="email" name="email" placeholder="Email" class="forms_field-input" required />
            </div>
            <div class="forms_field">
              <input type="password" name="password" placeholder="Password" class="forms_field-input" required />
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
<section class="container-md m-auto">
  <div class="row col-md-10 gap-5 mb-5 m-auto">
    <div class="col">
      <div class="card">
        <img src="/assets/connexion/134.jpg" class="img-fluid" alt="...">
      </div>
    </div>
    <div class="col">
      <div class="card">
        <img src="/assets/connexion/135.jpg" class="img-fluid" alt="...">
      </div>
    </div>
    <div class="col">
      <div class="card">
        <img src="/assets/connexion/136.jpg" class="img-fluid" alt="...">
      </div>
    </div>
  </div>
</section>