<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: connexion.php');
    exit();
}

// Récupérer les informations de l'utilisateur connecté
require '../../config/database.php';
$stmt = $pdo->prepare('SELECT * FROM utilisateurs WHERE id_utilisateur = ?');
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
    <link rel="stylesheet" href="/phpAfpa2024/GROUPE_N2_ECF4/public/css/styles.css">
</head>
<body>
    <h2>Profil</h2>
    <form action="../../traitement_profil.php" method="post">
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($user['nom']); ?>" required>
        
        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($user['prenom']); ?>" required>
        
        <label for="pseudo">Pseudo:</label>
        <input type="text" id="pseudo" name="pseudo" value="<?php echo htmlspecialchars($user['pseudo']); ?>" required>
        
        <label for="mail">Email:</label>
        <input type="email" id="mail" name="mail" value="<?php echo htmlspecialchars($user['mail']); ?>" required>
        
        <button type="submit">Mettre à jour</button>
    </form>
    <a href="../../deconnexion.php">Se déconnecter</a>
</body>
</html>
