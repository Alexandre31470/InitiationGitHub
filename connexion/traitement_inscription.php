<?php
require 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    $mdp = htmlspecialchars($_POST['mdp']);

    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        header('Location: views/users/inscription.php?error=Format d\'email invalide');
        exit();
    }

    if (strlen($mdp) < 8) {
        header('Location: views/users/inscription.php?error=Le mot de passe doit contenir au moins 8 caractères');
        exit();
    }

    $mdp_hashed = password_hash($mdp, PASSWORD_BCRYPT);

    try {
        $stmt = $pdo->prepare('INSERT INTO utilisateurs (nom, prenom, pseudo, mail, mot_de_passe_hash) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([$nom, $prenom, $pseudo, $mail, $mdp_hashed]);

        // Redirection vers la page de connexion après succès
        header('Location: views/users/pageconnexion.php?success=1');
        exit();
    } catch (PDOException $e) {
        header('Location: views/users/inscription.php?error=Erreur lors de l\'inscription');
        exit();
    }
} else {
    echo "Méthode de requête non autorisée.";
}
?>
