<?php
// Inclure le code de connexion à la base de données et la logique de récupération des articles
include 'accueil_logic.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOG</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/nav.css">
</head>

<body>
    <?php require_once '../nav/nav.php'; ?>

    <main>
        <section id="last_articles">
            <h2>Derniers articles</h2>
            <?php if (!empty($articles)) : ?>
                <?php foreach ($articles as $article) : ?>
                    <article class="article">
                        <div class="text">
                            <h3><?php echo htmlspecialchars($article['title']); ?></h3>
                            <p><?php echo htmlspecialchars($article['content']); ?></p>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php else : ?>
                <p>Aucun article trouvé.</p>
            <?php endif; ?>
            <div class="more">
                <a href="../liste_articles/liste_articles.php">Voir plus</a>
            </div>
        </section>

        <section id="new-article">
            <button type="button" onclick="window.location.href='../ajout_article/template_ajout_article.php'">Créer un nouvel
                article</button>
        </section>
    </main>

    <footer>
        <p>Coucou c'est moi tchoupi !</p>
    </footer>
</body>

</html> 