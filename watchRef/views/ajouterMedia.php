<?php

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un média</title>
    <link rel="stylesheet" href="../styles/ajouterMedia.css">
</head>
<body>
    <form action="../controllers/ajouterMedia.php" method="POST" enctype="multipart/form-data">
        <h2>Ajouter un média</h2>
        
        <div class="input-group">
            <label for="titre">Titre</label>
            <input type="text" id="titre" name="titre" placeholder="Titre du média" required>
        </div>
        
        <div class="input-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" placeholder="Description du média" required></textarea>
        </div>
        
        <div class="radio-group">
            <div class="radio-option">
                <input type="radio" id="film" name="type" value="film" required>
                <label for="film">Film</label>
            </div>
            <div class="radio-option">
                <input type="radio" id="serie" name="type" value="serie">
                <label for="serie">Série</label>
            </div>
            <div class="radio-option">
                <input type="radio" id="anime" name="type" value="anime">
                <label for="anime">Animé</label>
            </div>
        </div>
        
        <div class="file-input-container">
            <label for="image" class="file-input-label">
                Choisir une image
            </label>
            <input type="file" id="image" name="image" accept="image/*" required>
        </div>

        
        <div class="button-group">
            <a href="../views/catalogue.php" class="back-button">Retour</a>
            <button type="submit">Ajouter</button>
        </div>
    </form>
</body>
</html>