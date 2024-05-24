<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Activer le reporting des erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    $dsn = "mysql:host=localhost;dbname=ecfblog;charset=utf8";
    $username = "root";
    $password = "";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    $pdo = new PDO($dsn, $username, $password, $options);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pseudo = $_POST['pseudo'];
        $mot_de_passe = $_POST['mot_de_passe'];

        $stmt = $pdo->prepare("SELECT id_utilisateur, pseudo, mot_de_passe_hash FROM utilisateurs WHERE pseudo = :pseudo");
        $stmt->execute(['pseudo' => $pseudo]);
        $user = $stmt->fetch();

        if ($user && password_verify($mot_de_passe, $user['mot_de_passe_hash'])) {
            $_SESSION['user_id'] = $user['id_utilisateur'];
            $_SESSION['pseudo'] = $user['pseudo'];
            header("Location: ../pages/liste_articles/liste_articles.php");
            exit;
        } else {
            header("Location: connexion.php?error=Nom d'utilisateur ou mot de passe incorrect.");
            exit;
        }
    }
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    die();
}
