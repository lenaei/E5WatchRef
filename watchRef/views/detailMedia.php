<?php
require_once '../models/database.php'; 
require_once '../controllers/mediaController.php';

if (!isset($_GET['id'])) {
    echo "Média non trouvé.";
    exit;
}

$media_id = intval($_GET['id']);

// Récupérer les infos du média
$query = "SELECT * FROM medias WHERE id = :id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':id', $media_id, PDO::PARAM_INT);
$stmt->execute();
$media = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$media) {
    echo "Média introuvable.";
    exit;
}

// Récupérer les sites associés
$sites = getSitesByMedia($media_id, $pdo);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($media['titre']); ?></title>
    <link rel="stylesheet" href="../styles/detailMedia.css">
</head>
<body>
    <h1><?php echo htmlspecialchars($media['titre']); ?></h1>
    <p><?php echo nl2br(htmlspecialchars($media['description'])); ?></p>
    <img src="<?php echo htmlspecialchars($media['image']); ?>" alt="Image du média" style="max-width: 300px;">
    
    <h2>Sites de streaming disponibles :</h2>
    <?php if (!empty($sites)) : ?>
        <ul>
            <?php foreach ($sites as $site) : ?>
                <li>
                    <img src="<?php echo htmlspecialchars($site['image']); ?>" alt="<?php echo htmlspecialchars($site['nom_site']); ?>" style="width: 100px;">
                    <strong><?php echo htmlspecialchars($site['nom_site']); ?></strong><br>
                    <p><?php echo htmlspecialchars($site['description']); ?></p>
                    <a href="<?php echo htmlspecialchars($site['url']); ?>" target="_blank">Regarder sur <?php echo htmlspecialchars($site['nom_site']); ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>Aucun site de streaming trouvé pour ce média.</p>
    <?php endif; ?>
    
    <!-- Bouton retour catalogue -->
    <a href="catalogue.php" class="btn-retour">⬅ Retour au Catalogue</a>
</body>
</html>
