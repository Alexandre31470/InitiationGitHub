<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    try {
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE mail = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['mot_de_passe_hash'])) {
            $_SESSION['user'] = $user;
            header('Location: ../pages/accueil/accueil.php');
            exit();
        } else {
            header('Location: ../connexion/pageconnexion.php?error=Email ou mot de passe incorrect');
            exit();
        }
    } catch (PDOException $e) {
        header('Location: ../connexion/pageconnexion.php?error=Erreur de connexion à la base de données');
        exit();
    }
} else {
    echo "Méthode de requête non autorisée.";
}
