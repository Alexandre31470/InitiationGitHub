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

    // Vérifier si le formulaire a été soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $articleId = isset($_POST['id']) ? intval($_POST['id']) : 0;
        $title = isset($_POST['title']) ? $_POST['title'] : '';
        $content = isset($_POST['content']) ? $_POST['content'] : '';
        $category = isset($_POST['category']) ? $_POST['category'] : '';
        $author = $_SESSION['pseudo']; // Utiliser le pseudo de l'utilisateur connecté

        if ($articleId > 0 && !empty($title) && !empty($content) && !empty($category)) {
            // Prépare et exécute la mise à jour
            $stmt = $pdo->prepare("UPDATE articles SET title = :title, author = :author, content = :content, category = :category WHERE id = :id");
            $stmt->execute([
                'title' => $title,
                'author' => $author,
                'content' => $content,
                'category' => $category,
                'id' => $articleId
            ]);

            // Rediriger vers la page de détail de l'article modifié
            header("Location: ../detail_article/detail_article.php?id=$articleId");
            exit;
        } else {
            echo "Tous les champs sont requis.";
        }
    }

    // Récupère l'ID de l'article depuis l'URL
    $articleId = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if ($articleId > 0) {
        // Prépare et exécute la requête pour récupérer les détails de l'article
        $stmt = $pdo->prepare("SELECT id, title, author, category, content FROM articles WHERE id = :id");
        $stmt->execute(['id' => $articleId]);

        // Récupère l'article
        $article = $stmt->fetch();

        // Vérifier si l'utilisateur connecté est l'auteur de l'article
        if ($article['author'] !== $_SESSION['pseudo']) {
            header("Location: ../liste_articles/liste_articles.php");
            exit;
        }
    } else {
        $article = null;
    }
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    die();
}
?>