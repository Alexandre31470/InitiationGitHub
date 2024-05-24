<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../../connexion/views/users/connexion.php");
    exit;
}

// Si l'utilisateur est connecté, afficher le formulaire d'ajout d'article
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Article</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/ajout_article.css">
    <link rel="stylesheet" href="../css/nav.css">
</head>

<body>

    <?php require_once '../nav/nav.php'; ?>

    <div class="flex">
        <div class="form-container">
            <h2>Ajouter un Article</h2>
            <form id="article-form" action="ajout_article.php" method="post">
                <label for="title">Titre de l'Article</label>
                <input type="text" id="title" name="title" required>

                <label for="content">Contenu de l'Article</label>
                <textarea id="content" name="content" rows="10" required></textarea>

                <label for="category">Catégorie</label>
                <select id="category" name="category" required>
                    <option value="">Sélectionner une catégorie</option>
                    <option value="news">Actualités</option>
                    <option value="technology">Technologie</option>
                    <option value="lifestyle">Mode de vie</option>
                    <option value="health">Santé</option>
                    <option value="sports">Sports</option>
                </select>
                <div class="flex-btn">
                    <button type="submit" class="greenBTN">
                        <p>Soumettre l'Article</p>
                    </button>
                    <button type="button" class="redBTN" onclick="window.location.href='../accueil/accueil.php'">
                        <p>Annuler</p>
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
<footer>
    <p>&copy; <?php echo date("Y"); ?> Mon Blog. Tous droits réservés.</p>
</footer>

</html>