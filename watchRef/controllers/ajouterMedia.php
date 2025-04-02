<?php

require_once '../models/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $titre = $_POST['titre'];
    $description = $_POST['description'];
    $type = $_POST['type'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmp = $_FILES['image']['tmp_name'];
        $imageName = $_FILES['image']['name'];
        $imagePath = '../uploads/' . basename($imageName);

        if (move_uploaded_file($imageTmp, $imagePath)) {

            // Préparation de la requête pour insérer les données dans la base
            $query = "INSERT INTO medias (titre, description, type, image) 
                      VALUES (:titre, :description, :type, :image)";
            $stmt = $pdo->prepare($query);

            // Liaison des paramètres à la requête
            $stmt->bindParam(':titre', $titre);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':image', $imagePath);

            // Exécution de la requête
            if ($stmt->execute()) {
                // Redirige vers la page du catalogue après l'ajout
                header("Location: ../views/catalogue.php");
            } else {
                echo "Erreur lors de l'ajout du média.";
            }
        } else {
            echo "Erreur lors du téléchargement de l'image.";
        }
    } else {
        echo "Aucune image sélectionnée.";
    }
} else {
    echo "Méthode HTTP non autorisée.";
}
?>
