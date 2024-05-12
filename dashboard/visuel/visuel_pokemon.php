<?php
require_once dirname(__DIR__) . '/../dashboard/utilities/header.php';
require_once dirname(__DIR__) . '../../config/config.php';
require_once dirname(__DIR__) . '../../function/database.fn.php';
require_once __DIR__ . '../../functions/pokemons.fn.php';

$db = getPDOlink($config);
$types = getTypes($db);
$pokemonList = getPokemons($db);
$remainingIds = getRemainingPokemonIds($db);

?>
<script src="https://code.jquery.com/jquery-3.7.1.js"integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="crossorigin="anonymous"></script>		  
<link rel="stylesheet" href="../css/card.css">
<script defer src="../js/prewiew.js"></script>

<div id="layoutSidenav_content" class="col-md-9">
<div class="row">
    <div class="col-md-4 mb-4">
        <!-- Encadré de conseils -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Conseils</h5>
                <p><strong>Image :</strong>Nom du Pokemon, toujours la premiere lettre en Majuscule : <strong>Dracaufeu</strong></p>
                <p><strong>Nom :</strong> Nom du Pokemon, toujours la premiere lettre en Majuscule sans accent</p>
                <p><strong>Numéro :</strong> Sélectionnez le numéro du Pokémon, il correspond a la numérotation nationale .</p>
                <p><strong>Premier Type :</strong> Sélectionnez le premier type du Pokémon.</p>
                <p><strong>Deuxième Type :</strong> Sélectionnez le deuxième type du Pokémon, s'il en a un.</p>
            </div>
        </div>
    </div>
    <div class="col-md-8 mb-4">
        <!-- Formulaire d'ajout de l'image -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Ajouter une nouvelle image</h5>
                <!-- Formulaire pour ajouter une nouvelle image -->
                <form action="ajout_image.php" method="POST" enctype="multipart/form-data">
                    <!-- Input pour l'image -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                        <!-- Aperçu de l'image -->
                        <img id="imagePreview" src="#" alt="Aperçu de l'image" style="display: none; max-width: 50%; height: auto;">
                    </div>
                    <!-- Input pour le nom -->
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>
                    <!-- Sélection du numéro -->
                    <div class="mb-3">
                        <label for="numeros" class="form-label">Numéro</label>
                        <select name="id" class="form-select">
                            <?php foreach ($remainingIds as $id) : ?>
                                <option value="<?php echo $id; ?>"><?php echo $id; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- Sélection du premier type -->
                    <div class="mb-3">
                        <label for="type1" class="form-label">Premier Type</label>
                        <select name="type1_id" id="type1" class="form-select">
                            <option value="">Sélectionnez le premier type</option>
                            <?php foreach ($types as $type) : ?>
                                <option value="<?php echo $type['id']; ?>"><?php echo $type['nom']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- Sélection du deuxième type -->
                    <div class="mb-3">
                        <label for="type2" class="form-label">Deuxième Type (facultatif)</label>
                        <select name="type2_id" id="type2" class="form-select">
                            <option value="">Sélectionnez le deuxième type (facultatif)</option>
                            <?php foreach ($types as $type) : ?>
                                <option value="<?php echo $type['id']; ?>"><?php echo $type['nom']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <!-- Bouton pour ajouter -->
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
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
                                <a href="modifier.php?id=<?php echo $pokemon['id']; ?>" class="btn btn-success">Modifier</a>
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