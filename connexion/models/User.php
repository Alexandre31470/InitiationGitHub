<?php
class User
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function create($nom, $prenom, $pseudo, $email, $password)
    {
        $sql = "INSERT INTO users (nom, prenom, pseudo, email, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nom, $prenom, $pseudo, $email, $password]);
    }

    public function findByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    public function updatePassword($email, $newPassword)
    {
        $sql = "UPDATE users SET password = ? WHERE email = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([password_hash($newPassword, PASSWORD_BCRYPT), $email]);
    }
}
