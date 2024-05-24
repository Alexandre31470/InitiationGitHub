<?php
session_start();

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

    $articleId = isset($_GET['id']) ? intval($_GET['id']) : 0;

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

        if ($_POST['action'] === 'delete_comment' && isset($_SESSION['user_id'])) {
            $commentId = intval($_POST['comment_id']);

            $stmt = $pdo->prepare("SELECT author FROM comments WHERE id = :id");
            $stmt->execute(['id' => $commentId]);
            $comment = $stmt->fetch();

            if ($comment && $comment['author'] === $_SESSION['pseudo']) {
                $stmt = $pdo->prepare("DELETE FROM comments WHERE id = :id");
                $stmt->execute(['id' => $commentId]);
            }
        }

        if ($_POST['action'] === 'delete_article' && $articleId > 0 && isset($_SESSION['user_id'])) {

            $stmt = $pdo->prepare("SELECT author FROM articles WHERE id = :id");
            $stmt->execute(['id' => $articleId]);
            $article = $stmt->fetch();

            if ($article && $article['author'] === $_SESSION['pseudo']) {

                $stmt = $pdo->prepare("DELETE FROM comments WHERE article_id = :article_id");
                $stmt->execute(['article_id' => $articleId]);

                $stmt = $pdo->prepare("DELETE FROM articles WHERE id = :id");
                $stmt->execute(['id' => $articleId]);

                header("Location: ../accueil/accueil.php");
                exit;
            }
        }
    }

    if ($articleId > 0) {

        $stmt = $pdo->prepare("SELECT id, title, author, category, content FROM articles WHERE id = :id");
        $stmt->execute(['id' => $articleId]);

        $article = $stmt->fetch();

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
