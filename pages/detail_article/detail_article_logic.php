<?php
// Activer le reporting des erreurs
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

    // Récupère l'ID de l'article depuis l'URL
    $articleId = isset($_GET['id']) ? intval($_GET['id']) : 0;

    // Ajouter un commentaire
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_comment') {
        $author = $_POST['author'];
        $comment = $_POST['comment'];

        $stmt = $pdo->prepare("INSERT INTO comments (article_id, author, content) VALUES (:article_id, :author, :content)");
        $stmt->execute([
            'article_id' => $articleId,
            'author' => $author,
            'content' => $comment
        ]);
    }

    // Supprimer un commentaire
    if (isset($_POST['action']) && $_POST['action'] === 'delete_comment' && isset($_POST['comment_id'])) {
        $commentId = intval($_POST['comment_id']);

        $stmt = $pdo->prepare("DELETE FROM comments WHERE id = :id");
        $stmt->execute(['id' => $commentId]);
    }

    if ($articleId > 0) {
        // Prépare et exécute la requête pour récupérer les détails de l'article
        $stmt = $pdo->prepare("SELECT id, title, author, category, content FROM articles WHERE id = :id");
        $stmt->execute(['id' => $articleId]);

        // Récupère l'article
        $article = $stmt->fetch();

        // Récupère les commentaires associés à l'article
        $stmt = $pdo->prepare("SELECT id, author, content, created_at FROM comments WHERE article_id = :article_id ORDER BY created_at DESC");
        $stmt->execute(['article_id' => $articleId]);

        $comments = $stmt->fetchAll();
    } else {
        $article = null;
        $comments = [];
    }
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    die();
}
