<?php
require_once __DIR__ . ('/utilities/header.php');
?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tables</h1>
            <div class="card mb-4">
                <div class="card-header">
                    <button class="btn btn-success me-3" onclick="window.location.href='/../dashboard/Crud/form.php'">Créer un profil</button>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Compte</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Code Postal</th>
                                <th>Ville</th>
                                <th>Adresse Livraison </th>
                                <th>Adresse Facturation</th>
                                <th>Téléphone</th>
                                <th>Email</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Compte</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Code Postal</th>
                                <th>Ville</th>
                                <th>Adresse Livraison </th>
                                <th>Adresse Facturation</th>
                                <th>Téléphone</th>
                                <th>Email</th>
                                <th>Modifier</th>
                                <th>Supprimer</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            // Inclure les fichiers de configuration et de fonctions
                            require_once __DIR__ . '/../config/config.php';
                            require_once __DIR__ . '/../function/database.fn.php';

                            // Obtenez une connexion PDO à la base de données
                            $pdo = getPDOlink($config);

                            // Requête pour récupérer toutes les données des profils
                            $sql = "SELECT * FROM client";
                            $stmt = $pdo->query($sql);

                            // Affichage des données dans le tableau
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td>" . $row['id_compte'] . "</td>";
                                echo "<td>" . $row['nom_client'] . "</td>";
                                echo "<td>" . $row['prenom_client'] . "</td>";
                                echo "<td>" . $row['code_postal'] . "</td>";
                                echo "<td>" . $row['ville'] . "</td>";
                                echo "<td>" . $row['adresse_liv_client'] . "</td>";
                                echo "<td>" . $row['adresse_fac_client'] . "</td>";
                                echo "<td>" . $row['tel_client'] . "</td>";
                                echo "<td>" . $row['email_client'] . "</td>";
                                echo "<td>";
                                echo "<a href='/../dashboard/Crud/edit.php?id=" . $row['id_compte'] . "'><button type= 'button' class= 'btn btn-primary' >Modifier</button>";

                                echo "</td>";
                                echo "<td>";
                                echo "<a href='/../dashboard/Crud/delete.php?id=" . $row['id_compte'] . "' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer ce profil ?\")'><button type= 'button' class= 'btn btn-danger' >Supprimer</button>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <?php
    require_once __DIR__ . ('/utilities/footer.php');
    ?>