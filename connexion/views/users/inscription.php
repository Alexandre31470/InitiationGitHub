<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="/phpAfpa2024/GROUPE_N2_ECF4/public/css/styles.css">
</head>
<body>
    <form action="../../traitement_inscription.php" method="post">
        <h2>Inscription</h2>
        <?php if (isset($_GET['error'])) { echo "<p style='color:red;'>{$_GET['error']}</p>"; } ?>
        
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required>
        
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required>
        
        <label for="pseudo">Pseudo:</label>
        <input type="text" id="pseudo" name="pseudo" required>
        
        <label for="mail">Email:</label>
        <input type="email" id="mail" name="mail" required>
        
        <label for="mdp">Mot de passe:</label>
        <input type="password" id="mdp" name="mdp" required>
        
        <button type="submit">S'inscrire</button>
    </form>
</body>
</html>

