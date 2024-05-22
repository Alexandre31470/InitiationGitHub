<?php
require 'config/database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mail = htmlspecialchars($_POST['email']);
    $mdp = htmlspecialchars($_POST['password']);

    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        header('Location: views/users/pageconnexion.php?error=Format d\'email invalide');
        exit();
    }

    $stmt = $pdo->prepare('SELECT * FROM utilisateurs WHERE mail = ?');
    $stmt->execute([$mail]);
    $user = $stmt->fetch();

    if ($user && password_verify($mdp, $user['mot_de_passe_hash'])) {
        $_SESSION['user_id'] = $user['id_utilisateur'];
        header('Location: ../pages/accueil/index.html');
        exit();
    } else {
        header('Location: views/users/pageconnexion.php?error=Email ou mot de passe incorrect');
        exit();
    }
}
?>

