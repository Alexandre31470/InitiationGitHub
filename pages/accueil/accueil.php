<?php
// Inclure le code de connexion à la base de données et la logique de récupération des articles
include 'accueil_logic.php';
?>

<<<<<<< HEAD
<?php
require 'accueil.html';
?>

<?php if (!empty($articles)): ?>
=======
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOG</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header>
        <h1>Mon blog</h1>

        <nav>
            <ul>
                <li><a href="../accueil/accueil.html">Accueil</a></li>
                <li><a href="../liste_articles/liste_articles.html">Nos articles</a></li>
                <li class="dropdown">
                    <a href="#" class="dropbtn">Catégories</a>
                    <div class="dropdown-content">
                        <a href="#news">Actualités</a>
                        <a href="#technology">Technologies</a>
                        <a href="#lyfestyle">Mode de vie</a>
                        <a href="#health">Santé</a>
                        <a href="#sports">Sport</a>
                    </div>
                </li>
                <li class="connexion"><a href="login.php">Connexion</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="last_articles">
            <h2>Derniers articles</h2>
            <?php if (!empty($articles)): ?>
>>>>>>> 5c3e284f65ef017104f656890fadd24eca46473c
    <?php foreach ($articles as $article): ?>
        <article class="article">
            <div class="text">
                <h3><?php echo htmlspecialchars($article['title']); ?></h3>
                <p><?php echo htmlspecialchars($article['content']); ?></p>
            </div>
        </article>
    <?php endforeach; ?>
<?php else: ?>
    <p>Aucun article trouvé.</p>
<?php endif; ?>
            <div class="more">
                <a href="../liste_articles/liste_articles.html">Voir plus</a>
            </div>
        </section>

        <section id="new-article">
            <button type="button" onclick="window.location.href='../ajout_article/ajout_article.html'">Créer un nouvel
                article</button>
        </section>
    </main>

    <footer>
        <p>Coucou c'est moi tchoupi</p>
    </footer>
</body>

</html>