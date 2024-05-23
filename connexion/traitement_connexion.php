<?php
require 'config/database.php';  // Utilisation du chemin relatif qui fonctionne

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mail = htmlspecialchars($_POST['email']);
    $mdp = htmlspecialchars($_POST['password']);

    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        header('Location: views/users/connexion.php?error=Format d\'email invalide');
        exit();
    }

    try {
        $stmt = $pdo->prepare('SELECT * FROM utilisateurs WHERE mail = ?');
        $stmt->execute([$mail]);
        $user = $stmt->fetch();

        if ($user && password_verify($mdp, $user['mot_de_passe_hash'])) {
            session_start();
            $_SESSION['user_id'] = $user['id_utilisateur'];
            header('Location: ../pages/accueil/index.html');
            exit();
        } else {
            header('Location: views/users/connexion.php?error=Email ou mot de passe incorrect');
            exit();
        }
    } catch (PDOException $e) {
        header('Location: views/users/connexion.php?error=Erreur lors de la connexion');
        exit();
    }
} else {
    echo "Méthode de requête non autorisée.";
}
?>
