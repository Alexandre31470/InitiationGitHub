<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "ecfblog";

    try {
        // Connexion à la base de données MySQL via PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupérer les données du formulaire
        $title = $_POST['title'];
        $author = $_POST['author'];
        $content = $_POST['content'];
        $category = $_POST['category'];

        // Préparer la requête SQL pour insérer un nouvel article dans la base de données
        $stmt = $conn->prepare("INSERT INTO articles (title, author, content, category) VALUES (:title, :author, :content, :category)");

        // Lier les paramètres de la requête avec les valeurs du formulaire
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':category', $category);

        // Exécuter la requête SQL
        $stmt->execute();

        echo "Article ajouté avec succès.";
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }

    // Fermer la connexion à la base de données
    $conn = null;
} else {
    echo "Erreur : la requête n'est pas de type POST.";
}
