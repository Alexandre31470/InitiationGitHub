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
            <?php if (isset($_SESSION['pseudo']) && $article['author'] === $_SESSION['pseudo']) : ?>
                <button><a href="../editer_article/editer_article.php?id=<?php echo htmlspecialchars($article['id']); ?>">Modifier</a></button>
                <form action="detail_article.php?id=<?php echo $articleId; ?>" method="post" style="display:inline;">
                    <input type="hidden" name="action" value="delete_article">
                    <button type="submit">Supprimer la publication et les commentaires</button>
                </form>
            <?php endif; ?>
        </section>

        <section id="commentaire">
            <h2>Commentaires</h2>
            <?php if (!empty($comments)) : ?>
                <?php foreach ($comments as $comment) : ?>
                    <div class="comment">
                        <p><strong><?php echo htmlspecialchars($comment['author']); ?> :</strong> <?php echo htmlspecialchars($comment['content']); ?></p>
                        <?php if (isset($_SESSION['pseudo']) && $comment['author'] === $_SESSION['pseudo']) : ?>
                            <form action="detail_article.php?id=<?php echo $articleId; ?>" method="post" style="display:inline;">
                                <input type="hidden" name="action" value="delete_comment">
                                <input type="hidden" name="comment_id" value="<?php echo $comment['id']; ?>">
                                <button type="submit">Supprimer</button>
                            </form>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>Aucun commentaire trouvé.</p>
            <?php endif; ?>
        </section>

        <section id="add-comment-form">
            <?php if (isset($_SESSION['user_id'])) : ?>
                <h2>Formulaire d'ajout de commentaire</h2>
                <form action="detail_article.php?id=<?php echo $articleId; ?>" method="post">
                    <input type="hidden" name="action" value="add_comment">
                    <label for="comment">Commentaire</label>
                    <textarea id="comment" name="comment" rows="4" cols="50" required></textarea>
                    <div class="form-buttons">
                        <button type="submit">Ajouter</button>
                        <button type="reset">Annuler</button>
                    </div>
                </form>
            <?php else : ?>
                <p>Veuillez <a href="../../connexion/views/users/connexion.php">vous connecter</a> pour ajouter un commentaire.</p>
            <?php endif; ?>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Notre super Blog. Tous droits réservés à La Team.</p>
    </footer>

</body>

</html>