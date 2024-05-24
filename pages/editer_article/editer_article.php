<?php require_once 'editer_article_logic.php'; ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editer l'article</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/editer_article.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/ajout_article.css">
</head>

<body>

    <?php require_once '../nav/nav.php'; ?>

    <section class="formulaire-edition">
        <form id="article-form" action="editer_article_logic.php" method="post">
            <label for="title">Titre de l'Article</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($article['title']); ?>" required>

            <label for="author">Auteur</label>
            <input type="text" id="author" name="author" value="<?php echo htmlspecialchars($article['author']); ?>" required>

            <label for="content">Contenu de l'Article</label>
            <textarea id="content" name="content" rows="10" required><?php echo htmlspecialchars($article['content']); ?></textarea>

            <label for="category">Catégorie</label>
            <select id="category" name="category" required>
                <option value="">Sélectionner une catégorie</option>
                <option value="news" <?php echo ($article['category'] === 'news') ? 'selected' : ''; ?>>Actualités</option>
                <option value="technology" <?php echo ($article['category'] === 'technology') ? 'selected' : ''; ?>>Technologie</option>
                <option value="lifestyle" <?php echo ($article['category'] === 'lifestyle') ? 'selected' : ''; ?>>Mode de vie</option>
                <option value="health" <?php echo ($article['category'] === 'health') ? 'selected' : ''; ?>>Santé</option>
                <option value="sports" <?php echo ($article['category'] === 'sports') ? 'selected' : ''; ?>>Sports</option>
            </select>
            <div class="flex-btn">
                <button type="button" class="greenBTN" onclick="window.location.href='../accueil/accueil.php'">
                    <p>Annuler</p>
                </button>
                <button class="greenBTN">Supprimer la publication et les commentaires liés</button>
                <button type="submit" class="greenBTN">Mettre à jour</button>
            </div>
        </form>
    </section>

    <footer>
        <p>&copy;
            <?php echo date("Y"); ?> Mon Blog. Tous droits réservés.
        </p>
    </footer>

</body>

</html>