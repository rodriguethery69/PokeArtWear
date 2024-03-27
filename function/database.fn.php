<?php 
// Fonction pour obtenir un lien PDO vers la base de données en utilisant la configuration
  function getPDOlink($config){

    // Construction de la chaîne de connexion (DSN - Data Source Name)
    $dsn = 'mysql:dbname=' . $config['dbname'] . ';host=' . $config['dbhost'] . ';port=' . $config['dbport'];

    
    try {
      // Tentative de connexion à la base de données en utilisant PDO qui signifie PHP Data Objects, est une extension PHP qui fournit une interface uniforme pour accéder à des bases de données.
      $db = new PDO($dsn, $config['dbuser'], $config['dbpass']);

      // Configuration des options PDO
      $db->exec("SET NAMES utf8");// Définir l'encodage des caractères à UTF-8 La méthode exec est utilisée pour exécuter des requêtes SQL

      // Configuration du mode de récupération par défaut des résultats en tableau associatif
      $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

      // Retourne l'objet PDO représentant la connexion réussie à la base de données
      return $db;

    } catch (PDOException $e) {
      // En cas d'erreur, affiche un message d'erreur et arrête l'exécution du script
      exit('BDD Erreur de connexion : ' . $e->getMessage());
    }

  }