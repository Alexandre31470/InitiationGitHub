<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ecfblog";

    try {
        // Connexion à la base de données MySQL via PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupérer les données du formulaire
        $titre = $_POST['titre'];
        $auteur = $_POST['auteur'];
        $contenu = $_POST['contenu'];
        $categorie = $_POST['categorie'];

        // Préparer la requête SQL pour insérer un nouvel article dans la base de données
        $stmt = $conn->prepare("INSERT INTO articles (titre, auteur, contenu, id_categorie) VALUES (:titre, :auteur, :contenu, :id_categorie)");

        // Lier les paramètres de la requête avec les valeurs du formulaire
        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':auteur', $auteur);
        $stmt->bindParam(':contenu', $contenu);
        $stmt->bindParam(':id_categorie', $categorie);

        // Exécuter la requête SQL
        $stmt->execute();

        // Rediriger vers la page de confirmation
        header("Location: confirmation.php");
        exit();
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }

    // Fermer la connexion à la base de données
    $conn = null;
} else {
    echo "Erreur : la requête n'est pas de type POST.";
}
