<!-- confirmation.php -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
    <link rel="stylesheet" href="../css/ajout_article.css">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <?php require_once '../nav/nav.php'; ?>

    <h2>Article ajouté avec succès !</h2>
    <div class="container">
        <button class="greenBTN" onclick="window.location.href='template_ajout_article.php'">
            <p>Ajouter un autre article</p>
        </button>
        <button type="button" class="redBTN" onclick="window.location.href='../accueil/accueil.php'">
            <p>Retour à l'accueil</p>
        </button>
    </div>
</body>

</html>