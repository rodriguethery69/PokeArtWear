
<link rel="stylesheet" href="/assets/CSS/profil.css">

<section>
  <div class="container">
    <form id="profile" action="/profils/create_profil.php" method="post">
      <h3>Modifie Ton profil</h3>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="nom">Nom :</label>
            <input placeholder="Nom" type="text" tabindex="1" required autofocus id="nom_client" name="nom_client" class="form-control">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input placeholder="Prénom" type="text" tabindex="2" required id="prenom_client" name="prenom_client" class="form-control">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="code_postale">Code Postal :</label>
        <input placeholder="Code Postal" type="text" tabindex="3" required id="code_postal" name="code_postal" class="form-control">
      </div>
      <div class="form-group">
        <label for="ville">Ville :</label>
        <input placeholder="Ville" type="text" tabindex="4" required id="ville" name="ville" class="form-control">
      </div>
      <div class="form-group">
        <label for="adresse_liv">Adresse de livraison :</label>
        <input placeholder="Adresse de livraison" type="text" tabindex="5" required id="adresse_liv_client" name="adresse_liv_client" class="form-control">
      </div>
      <div class="form-group">
        <label for="adresse_fac">Adresse de facturation :</label>
        <input placeholder="Adresse de facturation" type="text" tabindex="6" required id="adresse_fac_client" name="adresse_fac_client" class="form-control">
      </div>
      <div class="form-group">
        <label for="telephone">Téléphone :</label>
        <input placeholder="Téléphone" type="tel" tabindex="8" required id="tel_client" name="tel_client" class="form-control">
      </div>
      <div class="form-group">
        <label for="email">Email :</label>
        <input placeholder="Email" type="email" tabindex="7" required id="email_client" name="email_client" class="form-control">
      </div>
      <button name="submit" type="submit" id="contact-submit" class="btn btn-primary" data-submit="...En Cours">Enregistrer les modifications</button>
    </form>
  </div>
</section>

