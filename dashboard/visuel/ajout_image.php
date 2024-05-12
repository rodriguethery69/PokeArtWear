<?php
require_once dirname(__DIR__) . '../../config/config.php';
require_once dirname(__DIR__) . '../../function/database.fn.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si le fichier a bien été envoyé et s'il n'y a pas d'erreur
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        // Chemin du répertoire de destination pour stocker les images
        $uploadDirectory = '../../assets/Pokemon/';

        // Chemin complet du fichier téléchargé
        $filePath = $uploadDirectory . basename($_FILES["image"]["name"]);

        // Déplacer le fichier téléchargé vers le répertoire de destination
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $filePath)) {
            // Récupérer les autres données du formulaire
            $nom = $_POST['nom'];
            $pokemon_id = $_POST['id'];
            $type1_id = $_POST['type1_id'];
            $type2_id = $_POST['type2_id'];

            // Insérer les données dans la base de données
            $db = getPDOlink($config);
            $sql_insert_pokemon = "INSERT INTO pokemons (id, nom, image_path) VALUES (:id, :nom, :image_path)";
            $stmt_insert_pokemon = $db->prepare($sql_insert_pokemon);
            $stmt_insert_pokemon->bindParam(':id', $pokemon_id); // Utiliser l'ID du Pokémon fourni
            $stmt_insert_pokemon->bindParam(':nom', $nom);
            $stmt_insert_pokemon->bindParam(':image_path', $filePath);
            $stmt_insert_pokemon->execute();

            // Insérer les types du Pokémon dans la table pokemon_types
            $sql_insert_types = "INSERT INTO pokemon_types (pokemon_id, type_id) VALUES (:pokemon_id, :type_id)";
            $stmt_insert_types = $db->prepare($sql_insert_types);
            $stmt_insert_types->bindParam(':pokemon_id', $pokemon_id);
            $stmt_insert_types->bindParam(':type_id', $type1_id);
            $stmt_insert_types->execute();

            // Si le deuxième type est sélectionné, insérer également dans la table pokemon_types
            if ($type2_id != 0) {
                $stmt_insert_types->bindParam(':type_id', $type2_id);
                $stmt_insert_types->execute();
            }

            // Rediriger vers une page de succès ou afficher un message de succès
            header("Location: http://pokeartwear/dashboard/visuel/visuel_pokemon.php");
            exit();
        } else {
            // Une erreur s'est produite lors du téléchargement du fichier
            echo "Une erreur s'est produite lors du téléchargement de l'image.";
        }
    } else {
        // Aucun fichier n'a été téléchargé ou une erreur s'est produite
        echo "Veuillez sélectionner une image.";
    }
}
