<?php
// Activer le reporting des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Code de connexion à la base de données
try {
    $dsn = "mysql:host=localhost;dbname=ecfblog;charset=utf8";
    $username = "root";
    $password = "";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    $pdo = new PDO($dsn, $username, $password, $options);

    // Vérifie si une catégorie est sélectionnée
    $category = isset($_GET['category']) ? $_GET['category'] : null;

    if ($category) {
        // Prépare et exécute la requête pour filtrer les articles par catégorie
        $stmt = $pdo->prepare("SELECT id, title, author, content, category FROM articles WHERE category = :category ORDER BY created_at");
        $stmt->execute(['category' => $category]);
    } else {
        // Prépare et exécute la requête pour récupérer tous les articles
        $stmt = $pdo->query("SELECT id, title, author, content, category FROM articles ORDER BY created_at");
    }

    // Récupère les résultats
    $articles = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    die();
}
