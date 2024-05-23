<?php
$dsn = 'mysql:host=localhost;dbname=ecfblog';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    // Définir le mode d'erreur PDO sur Exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Échec de la connexion : " . $e->getMessage());
}

// Les données à insérer
$title = "Titre de l'article";
$content = "Contenu de l'article";

try {
    // Préparer la requête SQL d'insertion
    $sql = "INSERT INTO articles (title, content) VALUES (:title, :content)";

    // Initialiser la requête
    $stmt = $pdo->prepare($sql);

    // Lier les paramètres
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);

    // Exécuter la requête
    $stmt->execute();

    echo "Nouvel enregistrement créé avec succès";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

// Fermer la connexion
$pdo = null;