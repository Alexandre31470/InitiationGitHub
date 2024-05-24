<?php
require 'config/database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);

    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        header('Location: views/users/profil.php?error=Format d\'email invalide');
        exit();
    }

    try {
        $stmt = $pdo->prepare('UPDATE utilisateurs SET nom = ?, prenom = ?, pseudo = ?, mail = ? WHERE id_utilisateur = ?');
        $stmt->execute([$nom, $prenom, $pseudo, $mail, $_SESSION['user_id']]);
        header('Location: views/users/profil.php?success=Profil mis à jour');
    } catch (PDOException $e) {
        header('Location: views/users/profil.php?error=Erreur lors de la mise à jour du profil');
    }
}
