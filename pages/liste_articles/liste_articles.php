<?php
include 'liste_articles_logic.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/liste_article.css">
    <title>Mes Articles</title>
</head>

<body>
    <?php require_once '../nav/nav.php'; ?>
    <main>
        <h2>Mes articles</h2>
        <div class="liste_articles">
            <?php if (!empty($articles)) : ?>
                <?php foreach ($articles as $article) : ?>
                    <article class="article">
                        <a href="../detail_article/detail_article.php?id=<?php echo htmlspecialchars($article['id']); ?>">
                            <div class="text">
                                <h2><?php echo htmlspecialchars($article['title']); ?></h2>
                                <h3><?php echo htmlspecialchars($article['author']); ?></h3>
                                <h4><?php echo htmlspecialchars($article['category']); ?></h4>
                            </div>
                        </a>
                    </article>
                <?php endforeach; ?>
            <?php else : ?>
                <p>Aucun article trouvé.</p>
            <?php endif; ?>
        </div>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Mon Blog. Tous droits réservés.</p>
    </footer>
</body>

</html>