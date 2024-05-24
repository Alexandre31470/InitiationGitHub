<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../connexion/views/users/connexion.php");
    exit;
}

// Activer le reporting des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    $dsn = "mysql:host=localhost;dbname=ecfblog;charset=utf8";
    $username = "root";
    $password = "";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    $pdo = new PDO($dsn, $username, $password, $options);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category = $_POST['category'];
        $author = $_SESSION['pseudo']; // Utiliser le pseudo de l'utilisateur connecté

        $stmt = $pdo->prepare("INSERT INTO articles (title, content, category, author) VALUES (:title, :content, :category, :author)");
        $stmt->execute([
            'title' => $title,
            'content' => $content,
            'category' => $category,
            'author' => $author
        ]);

        // Rediriger vers la liste des articles après l'ajout
        header("Location: ../liste_articles/liste_articles.php");
        exit;
    }
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    die();
}
?>