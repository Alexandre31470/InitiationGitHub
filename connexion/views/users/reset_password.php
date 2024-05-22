<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réinitialiser le mot de passe</title>
    <link rel="stylesheet" href="/phpAfpa2024/groupe_N2_Ecf4/public/css/styles.css">
</head>
<body>
    <form action="../../traitement_reset_password.php" method="post">
        <h2>Réinitialiser le mot de passe</h2>
        <?php if (isset($_GET['error'])) { echo "<p style='color:red;'>{$_GET['error']}</p>"; } ?>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="new_password">Nouveau mot de passe:</label>
        <input type="password" id="new_password" name="new_password" required>
        
        <button type="submit">Réinitialiser</button>
    </form>
</body>
</html>

