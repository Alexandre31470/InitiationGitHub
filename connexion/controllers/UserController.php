<?php
require_once '../models/User.php';

class UserController
{
    private $userModel;

    public function __construct($pdo)
    {
        $this->userModel = new User($pdo);
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header('Location: ../views/users/inscription.php?error=Format d\'email invalide');
                exit();
            }

            if (strlen($password) < 8) {
                header('Location: ../views/users/inscription.php?error=Le mot de passe doit contenir au moins 8 caractères');
                exit();
            }

            $password_hashed = password_hash($password, PASSWORD_BCRYPT);

            if ($this->userModel->create($nom, $prenom, $pseudo, $email, $password_hashed)) {
                header('Location: ../views/users/connexion.php');
            } else {
                header('Location: ../views/users/inscription.php?error=Erreur lors de l\'inscription');
            }
        } else {
            include '../views/users/inscription.php';
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header('Location: ../views/users/connexion.php?error=Format d\'email invalide');
                exit();
            }

            $user = $this->userModel->findByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                header('Location: ../views/users/backoffice.php');
            } else {
                header('Location: ../views/users/connexion.php?error=Email ou mot de passe incorrect');
            }
        } else {
            include '../views/users/connexion.php';
        }
    }

    public function resetPassword()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = htmlspecialchars($_POST['email']);
            $new_password = htmlspecialchars($_POST['new_password']);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header('Location: ../views/users/reset_password.php?error=Format d\'email invalide');
                exit();
            }

            if (strlen($new_password) < 8) {
                header('Location: ../views/users/reset_password.php?error=Le mot de passe doit contenir au moins 8 caractères');
                exit();
            }

            $new_password_hashed = password_hash($new_password, PASSWORD_BCRYPT);

            if ($this->userModel->updatePassword($email, $new_password_hashed)) {
                header('Location: ../views/users/connexion.php');
            } else {
                header('Location: ../views/users/reset_password.php?error=Erreur lors de la réinitialisation du mot de passe');
            }
        } else {
            include '../views/users/reset_password.php';
        }
    }
}
