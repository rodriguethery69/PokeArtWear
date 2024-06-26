<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../function/database.fn.php';

// Récupére tous les types de Pokémon
function getTypes($db) {
    $sql = "SELECT * FROM types";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $types = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $types;
}

// Récupére tous les informations Pokemons avec les types respectifs
function getPokemon($db, $typeFilter = 0) {
    if ($typeFilter == 0) {
        $sql = "SELECT p.id AS pokemon_id, p.nom AS pokemon_nom, p.image_path AS pokemon_image, t.nom AS type_nom, t.couleurs AS type_couleur
                FROM pokemons p
                JOIN pokemon_types pt ON p.id = pt.pokemon_id
                JOIN types t ON pt.type_id = t.id
                GROUP BY p.id
                ORDER BY p.id";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $sql = "SELECT p.id AS pokemon_id, p.nom AS pokemon_nom, p.image_path AS pokemon_image, t.nom AS type_nom, t.couleurs AS type_couleur
                FROM pokemons p
                JOIN pokemon_types pt ON p.id = pt.pokemon_id
                JOIN types t ON pt.type_id = t.id
                WHERE pt.type_id = ?
                ORDER BY p.id";
        $stmt = $db->prepare($sql);
        $stmt->execute([$typeFilter]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

// Récupère toutes les tailles avec leurs libellés
function getTailles($db) {
    $sql = "SELECT id, taille FROM tailles ORDER BY `id` ASC"; // Sélectionnez également le libellé de la taille
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $tailles = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $tailles;
}

// function getTailleById($db, $tailleId) {
//     $sql = "SELECT taille FROM tailles WHERE id = :id";
//     $stmt = $db->prepare($sql);
//     $stmt->bindValue(':id', $tailleId);
//     $stmt->execute();
//     $result = $stmt->fetch(PDO::FETCH_ASSOC);
//     return $result['taille'];
// }

// Récupére les quantités de la base de données
function getQuantités($db) {
    $sql = "SELECT * FROM quantites";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $quantites = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $quantites;
}

// Récupére le prix du t-shirt
function getPrix($db) {
    $sql = "SELECT prix_normal FROM prix;";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $prixNormal = $stmt->fetchColumn();
    return $prixNormal;
}

function getPokemonNameByImage($db, $image_path) {
    // Requête SQL pour récupérer le nom du Pokémon correspondant à l'image
    $sql = "SELECT nom FROM pokemons WHERE image_path = :image_path";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':image_path', $image_path, PDO::PARAM_STR);
    $stmt->execute();
    $pokemon = $stmt->fetch(PDO::FETCH_ASSOC);
    // Si un Pokémon correspondant est trouvé, retournez son nom, sinon retournez "Pokemon inconnu"
    return $pokemon ? $pokemon['nom'] : "Pokemon inconnu";
}

    