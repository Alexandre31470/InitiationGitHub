<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="../../public/css/styles.css">
</head>

<body>
    <form action="../../traitement_connexion.php" method="post">
        <h2>Connexion</h2>
        <?php
        if (isset($_GET['error'])) {
            echo '<p style="color:red;">' . htmlspecialchars($_GET['error']) . '</p>';
        }

        if (isset($_GET['success'])) {
            if ($_GET['success'] == 1) {
                echo '<p style="color:green;">Inscription réussie ! Veuillez vous connecter.</p>';
            } elseif ($_GET['success'] == 2) {
                echo '<p style="color:green;">Mot de passe réinitialisé avec succès ! Veuillez vous connecter.</p>';
            }
        }
        ?>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Se connecter</button>
        <a href="reset_password.php">Mot de passe oublié ?</a>
        <a href="inscription.php">Créer un compte</a>
    </form>
</body>

</html>