<?php
session_start();

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

    // Récupère l'ID de l'article depuis l'URL
    $articleId = isset($_GET['id']) ? intval($_GET['id']) : 0;

    // Ajouter un commentaire
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
        if ($_POST['action'] === 'add_comment' && isset($_SESSION['user_id'])) {
            $author = $_SESSION['pseudo'];
            $comment = $_POST['comment'];

            $stmt = $pdo->prepare("INSERT INTO comments (article_id, author, content) VALUES (:article_id, :author, :content)");
            $stmt->execute([
                'article_id' => $articleId,
                'author' => $author,
                'content' => $comment
            ]);
        }

        // Supprimer un commentaire
        if ($_POST['action'] === 'delete_comment' && isset($_SESSION['user_id'])) {
            $commentId = intval($_POST['comment_id']);

            // Vérifier si l'utilisateur est l'auteur du commentaire
            $stmt = $pdo->prepare("SELECT author FROM comments WHERE id = :id");
            $stmt->execute(['id' => $commentId]);
            $comment = $stmt->fetch();

            if ($comment && $comment['author'] === $_SESSION['pseudo']) {
                $stmt = $pdo->prepare("DELETE FROM comments WHERE id = :id");
                $stmt->execute(['id' => $commentId]);
            }
        }

        // Supprimer l'article et ses commentaires
        if ($_POST['action'] === 'delete_article' && $articleId > 0 && isset($_SESSION['user_id'])) {
            // Vérifier si l'utilisateur est l'auteur de l'article
            $stmt = $pdo->prepare("SELECT author FROM articles WHERE id = :id");
            $stmt->execute(['id' => $articleId]);
            $article = $stmt->fetch();

            if ($article && $article['author'] === $_SESSION['pseudo']) {
                // Supprimer les commentaires associés
                $stmt = $pdo->prepare("DELETE FROM comments WHERE article_id = :article_id");
                $stmt->execute(['article_id' => $articleId]);

                // Supprimer l'article
                $stmt = $pdo->prepare("DELETE FROM articles WHERE id = :id");
                $stmt->execute(['id' => $articleId]);

                // Rediriger vers la page d'accueil ou une autre page appropriée
                header("Location: ../accueil/accueil.php");
                exit;
            }
        }
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