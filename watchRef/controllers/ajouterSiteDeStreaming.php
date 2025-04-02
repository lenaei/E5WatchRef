<?php

require_once '../models/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nomSite = $_POST['titre'];
    $description = $_POST['description'];
    $url = $_POST['url'];
    
    
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmp = $_FILES['image']['tmp_name'];
        $imageName = $_FILES['image']['name'];
        $imagePath = '../uploads/' . basename($imageName);
        
        
        if (move_uploaded_file($imageTmp, $imagePath)) {
            
            $query = "INSERT INTO sites_streaming (nom_site, description, url, image) VALUES (:nom_site, :description, :url, :image)";
            $stmt = $pdo->prepare($query);
            
            
            $stmt->bindParam(':nom_site', $nomSite);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':url', $url);
            $stmt->bindParam(':image', $imagePath);
            
            
            if ($stmt->execute()) {    
                //echo "Le site de streaming a été ajouté avec succès !";
                header("Location: ../views/catalogue.php");
            } else {
                echo "Erreur lors de l'ajout du site.";
            }
        } else {
            echo "Erreur lors du téléchargement de l'image.";
        }
    }
} else {
    echo "Méthode HTTP non autorisée.";
}
?>
