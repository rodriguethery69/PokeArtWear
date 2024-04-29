<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/database.fn.php';

function getPokemons($db) {
    $sql = "SELECT p.id AS pokemon_id, p.nom AS pokemon_nom, p.image_path AS pokemon_image, t.id AS type_id, t.nom AS type_nom, t.couleurs AS type_couleur
            FROM pokemons p
            JOIN pokemon_types pt ON p.id = pt.pokemon_id
            JOIN types t ON pt.type_id = t.id
            ORDER BY RAND()
            LIMIT 6";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}