<?php
require_once dirname(__DIR__) . '/../dashboard/utilities/header.php';
require_once dirname(__DIR__) . '/../config/config.php';
require_once dirname(__DIR__) . '/../function/database.fn.php';


$pdo = getPDOlink($config);
?>

<div id="layoutSidenav_content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Créer un nouveau profil</h5>
                        <form action="/dashboard/Crud/create.php" method="post">
                            <div class="mb-3">
                                <label for="id" class="form-label">Choisir le compte associé :</label>
                                <select class="form-select" name="id" required>
                                    <!-- Option par défaut -->
                                    <option value="id" selected disabled>Choisissez un compte</option>
                                    <!-- Boucle sur les comptes existants pour créer les options -->
                                    <?php
                                    // Requête pour récupérer tous les comptes
                                    $sql = "SELECT id FROM compte WHERE id NOT IN (SELECT id_compte FROM client)";
                                    $stmt = $pdo->query($sql);

                                    // Parcourir les résultats et afficher les options
                                    while ($row = $stmt->fetch()) {
                                        echo "<option value='" . $row['id'] . "'>" . $row['id'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="id_compte" class="form-label">ID Compte :</label>
                                <input type="text" class="form-control" name="id_compte" required>
                            </div>
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom :</label>
                                <input type="text" class="form-control" name="nom_client" required>
                            </div>
                            <div class="mb-3">
                                <label for="prenom" class="form-label">Prénom :</label>
                                <input type="text" class="form-control" name="prenom_client" required>
                            </div>
                            <div class="mb-3">
                                <label for="code_postal" class="form-label">Code Postal :</label>
                                <input type="text" class="form-control" name="code_postal" required>
                            </div>
                            <div class="mb-3">
                                <label for="ville" class="form-label">Ville :</label>
                                <input type="text" class="form-control" name="ville" required>
                            </div>
                            <div class="mb-3">
                                <label for="adresse_liv" class="form-label">Adresse de livraison :</label>
                                <input type="text" class="form-control" name="adresse_liv_client" required>
                            </div>
                            <div class="mb-3">
                                <label for="adresse_fac" class="form-label">Adresse de facturation :</label>
                                <input type="text" class="form-control" name="adresse_fac_client" required>
                            </div>
                            <div class="mb-3">
                                <label for="tel" class="form-label">Téléphone :</label>
                                <input type="tel" class="form-control" name="tel_client" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email :</label>
                                <input type="email" class="form-control" name="email_client" required>
                            </div>
                            <div class="text-center"> 
                                <button type="submit" class="btn btn-primary">Créer le Profil</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>