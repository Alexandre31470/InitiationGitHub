<?php
require 'config/database.php';  // Utilisation du chemin relatif correct

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mail = htmlspecialchars($_POST['email']);
    $new_mdp = htmlspecialchars($_POST['new_password']);

    // Validation de l'email
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        header('Location: views/users/reset_password.php?error=Format d\'email invalide');
        exit();
    }

    // Vérification de la longueur du nouveau mot de passe
    if (strlen($new_mdp) < 8) {
        header('Location: views/users/reset_password.php?error=Le mot de passe doit contenir au moins 8 caractères');
        exit();
    }

    // Hashage du nouveau mot de passe
    $new_mdp_hashed = password_hash($new_mdp, PASSWORD_BCRYPT);

    try {
        // Préparation de la requête SQL de mise à jour
        $sql = "UPDATE utilisateurs SET mot_de_passe_hash = :new_mdp WHERE mail = :mail";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':new_mdp', $new_mdp_hashed);
        $stmt->bindParam(':mail', $mail);
        $stmt->execute();

        // Redirection après succès
        header('Location: pageconnexion.php?success=2');
        exit();
    } catch (PDOException $e) {
        header('Location: views/users/reset_password.php?error=Erreur lors de la mise à jour du mot de passe');
        exit();
    }
} else {
    echo "Méthode de requête non autorisée.";
}
?>


