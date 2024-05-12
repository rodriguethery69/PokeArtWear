<?php
require_once __DIR__ . '../../../config/config.php';
require_once __DIR__ . '../../../function/database.fn.php';

// Récupére tous les types de Pokémon
function getTypes($db) {

    $sql = "SELECT id, nom FROM types";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $types = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $types;
}

function getPokemons($db) {

    $sql = "SELECT id, nom, image_path FROM pokemons";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    //la requête sous forme de tableau associatif
    $pokemonList = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $pokemonList;
}

// Définir une fonction pour récupérer les IDs existants dans la table pokemons
function getExistePokemonIds($db) {

    $sql = "SELECT id FROM pokemons";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $existeIds = $stmt->fetchAll(PDO::FETCH_COLUMN);
    return $existeIds;
}

function getRemainingPokemonIds($db) {

    // Récupérer tous les IDs existants
    $existeIds = getExistePokemonIds($db);
    
    // Générer les IDs restants 
    $remainingIds = range(1, 151); 

    // Retirer les IDs existants des IDs restants
    $remainingIds = array_diff($remainingIds, $existeIds);

    // Retourner les IDs restants
    return $remainingIds;
}