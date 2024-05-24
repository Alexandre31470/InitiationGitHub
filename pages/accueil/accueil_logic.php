<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

    $stmt = $pdo->query("SELECT id, title, content FROM articles ORDER BY created_at DESC LIMIT 3");

    $articles = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    die();
}
