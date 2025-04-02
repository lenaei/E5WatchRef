<?php

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un site de streaming...</title>
    <link rel="stylesheet" href="../styles/ajouterSiteDeStreaming.css">
</head>

<body>

    <form action="../controllers/ajouterSiteDeStreaming.php" method="POST" enctype="multipart/form-data">

    <h2>Ajouter un site de streaming...</h2>
        <input type="text" name="titre" placeholder="Nom du site (ex: Netflix, Crunchyroll, Disney+)" required>
        <input type="text" name="description" placeholder="Description du site" required>
        <input type="url" name="url" placeholder="URL du site (ex: https://www.netflix.com)" required>
        <input type="file" name="image" accept="image/*" required>
        </br>

        <a href="../views/catalogue.php" class="back-button">Retour</a>
        <button type="submit">Ajouter</button>
    </form>

</body>

</html>
