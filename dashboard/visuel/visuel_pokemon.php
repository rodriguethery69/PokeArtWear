<?php
require_once dirname(__DIR__) . '/../dashboard/utilities/header.php';
require_once dirname(__DIR__) . '../../config/config.php';
require_once dirname(__DIR__) . '../../function/database.fn.php';


$pdo = getPDOlink($config);

// Requête SQL pour sélectionner toutes les informations sur les Pokémon, y compris les chemins d'image
$sql = "SELECT id, nom, image_path FROM pokemons";

// Préparer la requête
$stmt = $pdo->prepare($sql);

// Exécuter la requête
$stmt->execute();

// Récupérer les résultats de la requête sous forme de tableau associatif
$pokemonList = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<link rel="stylesheet" href="../css/card.css">

<div id="layoutSidenav_content" class="col-md-9">
<div class="row">
    <!-- Carte d'ajout d'une nouvelle image -->
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Ajouter une nouvelle image</h5>
                <!-- Formulaire pour ajouter une nouvelle image -->
                <form action="ajouter_image.php" method="POST">
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                    </div>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>
                    <div class="mb-3">
                        <label for="types" class="form-label">Types</label>
                        <select class="form-select" id="types" name="types[]" multiple required>
                            <option value="type1">Type 1</option>
                            <option value="type2">Type 2</option>
                            <!-- Ajoutez d'autres options pour les types si nécessaire -->
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
    </div>

    <div class="row ">
        <?php foreach ($pokemonList as $pokemon) : ?>
            <div class="col-md-2 mb-4">
                <div class="card">
                    <img src="<?php echo $pokemon['image_path']; ?>" class="img-fluid rounded-3" alt="Image du Pokémon">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $pokemon['nom']; ?></h5>
                        <div class="button-container">
                            <a href="modifier.php?id=<?php echo $pokemon['id']; ?>" class="btn btn-primary">Modifier</a>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal<?php echo $pokemon['id']; ?>">Supprimer</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal de confirmation de suppression -->
            <div class="modal fade" id="confirmDeleteModal<?php echo $pokemon['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmation de suppression</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Êtes-vous sûr de vouloir supprimer ce Pokémon ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                            <a href="supprimer.php?id=<?php echo $pokemon['id']; ?>" class="btn btn-danger">Supprimer</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>