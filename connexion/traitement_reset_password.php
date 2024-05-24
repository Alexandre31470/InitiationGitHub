<?php
require 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $mail = htmlspecialchars($_POST['email']);
    $new_mdp = htmlspecialchars($_POST['new_password']);

    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        header('Location: views/users/reset_password.php?error=Format d\'email invalide');
        exit();
    }

    if (strlen($new_mdp) < 8) {
        header('Location: views/users/reset_password.php?error=Le mot de passe doit contenir au moins 8 caractères');
        exit();
    }

    $new_mdp_hashed = password_hash($new_mdp, PASSWORD_BCRYPT);

    try {
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
