<?php include 'detail_article_logic.php'; ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail de l'article</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/details.css">
    <link rel="stylesheet" href="../css/nav.css">
</head>

<body>
    <?php require_once '../nav/nav.php'; ?>
    <main>

        <section id="article">
            <?php if (!empty($article)) : ?>
                <article class="article">
                    <div class="text">
                        <h2><?php echo htmlspecialchars($article['title']); ?></h2>
                        <h3><?php echo htmlspecialchars($article['author']); ?></h3>
                        <h4><?php echo htmlspecialchars($article['category']); ?></h4>
                        <p><?php echo htmlspecialchars($article['content']); ?></p>
                    </div>
                </article>
            <?php else : ?>
                <p>Aucun article trouvé.</p>
            <?php endif; ?>
        </section>

        <section id="actions">
            <button>Modifier</button>
            <button>Supprimer la publication et les commentaires</button>
        </section>

        <section id="commentaire">
            <h2>Commentaires</h2>
            <div class="comment">
                <p><strong>Utilisateur 1 :</strong> Commentaire de l'utilisateur 1.</p>
            </div>
            <div class="comment">
                <p><strong>Utilisateur 2 :</strong> Commentaire de l'utilisateur 2.</p>
            </div>
        </section>

        <section id="add-comment-form">
            <h2>Formulaire d'ajout de commentaire</h2>
            <form action="ajouter-commentaire.php" method="post">
                <textarea name="comment" rows="4" cols="50" placeholder="Votre commentaire"></textarea>
                <div class="form-buttons">
                    <button type="submit">Ajouter</button>
                    <button type="reset">Annuler</button>
                </div>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Mon Blog. Tous droits réservés.</p>
    </footer>
</body>

</html>