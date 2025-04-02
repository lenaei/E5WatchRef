<?php

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attacher un site à un média</title>
    <link rel="stylesheet" href="../styles/attacherSite.css">
</head>
<body>
    <form action="../controllers/mediaController.php?action=attach" method="POST">
        <h2>Attacher un site de streaming à un média</h2>
        
        <div class="input-group">
            <label for="media_id">Média</label>
            <select id="media_id" name="media_id" required>
                <option value="">Choisir un média</option>
                <?php
                require_once '../controllers/mediaController.php';
                $medias = getAllMedias(); // Fonction pour récupérer tous les médias
                foreach ($medias as $media) {
                    echo "<option value='" . $media['id'] . "'>" . htmlspecialchars($media['titre']) . "</option>";
                }
                ?>
            </select>
        </div>
        
        <div class="input-group">
            <label for="site_id">Site de streaming</label>
            <select id="site_id" name="site_id" required>
                <option value="">Choisir un site de streaming</option>
                <?php
                require_once '../controllers/siteController.php';
                $sites = getAllSites(); // Fonction pour récupérer tous les sites
                foreach ($sites as $site) {
                    echo "<option value='" . $site['id'] . "'>" . htmlspecialchars($site['nom_site']) . "</option>";
                }
                ?>
            </select>
        </div>

        <div class="button-group">
            <a href="../views/catalogue.php" class="back-button">Retour</a>
            <button type="submit">Attacher</button>
        </div>
    </form>
</body>
</html>
