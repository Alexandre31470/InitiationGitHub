<?php
include 'liste_logic.php';
?>

<!DOCTYPE html>
<html lang="fr">

<<<<<<< HEAD
// Les données à insérer
$title = "Titre de l'article";
$content = "Contenu de l'article";

// try {
//     // Préparer la requête SQL d'insertion
//     $sql = "INSERT INTO articles (title, content) VALUES (:title, :content)";

//     // Initialiser la requête
//     $stmt = $pdo->prepare($sql);

//     // Lier les paramètres
//     $stmt->bindParam(':title', $title);
//     $stmt->bindParam(':content', $content);

//     // Exécuter la requête
//     $stmt->execute();

//     echo "Nouvel enregistrement créé avec succès";
// } catch (PDOException $e) {
//     echo "Erreur : " . $e->getMessage();
// }
=======
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/liste_article.css">
    <title> Mes Articles</title>
</head>

<body>

    <?php require_once '../nav/nav.php'; ?>

    <h2>Mes articles</h2>
    <div class="liste_articles">
        <?php if (!empty($articles)) : ?>
            <?php foreach ($articles as $article) : ?>
                <article class="article">
                    <div class="text">
                        <h2><?php echo htmlspecialchars($article['title']); ?></h2>
                        <h3><?php echo htmlspecialchars($article['author']); ?></h3>
                        <h4><?php echo htmlspecialchars($article['category']); ?></h4>
                    </div>
                </article>
            <?php endforeach; ?>
        <?php else : ?>
            <p>Aucun article trouvé.</p>
        <?php endif; ?>
    </div>

    <footer>
        <p>&copy; 2024 Mon blog. Tous droits réservés.</p>
    </footer>

</body>
>>>>>>> 55412c33dd65a3b14227023fbba777720cd54207

</html>