<?php
session_start();


//Vérifie si l'utilisateur est connecté 
if (isset($_SESSION['prenom'])) {
    $prenom = $_SESSION['prenom'];
} else {
    //sinon le renvoi vers la page de connexion
    header("Location: ../views/connexion.php");
    
}

require_once '../models/database.php';

// Requête pour récupérer les sites de streaming
$querySites = "SELECT * FROM sites_streaming";
$stmtSites = $pdo->query($querySites);
$sites = $stmtSites->fetchAll(PDO::FETCH_ASSOC);

// Requête pour récupérer les films
$queryFilms = "SELECT * FROM medias WHERE type = 'film'";
$stmtFilms = $pdo->query($queryFilms);
$films = $stmtFilms->fetchAll(PDO::FETCH_ASSOC);

// Requête pour récupérer les séries
$querySeries = "SELECT * FROM medias WHERE type = 'serie'";
$stmtSeries = $pdo->query($querySeries);
$series = $stmtSeries->fetchAll(PDO::FETCH_ASSOC);

// Requête pour récupérer les animés
$queryAnimes = "SELECT * FROM medias WHERE type = 'anime'";
$stmtAnimes = $pdo->query($queryAnimes);
$animes = $stmtAnimes->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue</title>
    <link rel="stylesheet" href="../styles/catalogue.css">
</head>
<body>
    <header>
        <h1>WatchRef</h1>
        <?php echo htmlspecialchars($prenom); ?>
        <a href="../controllers/deconnexion.php" class="btn-deconnexion">Déconnexion</a>
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin'): ?>
            <a href="../views/ajoutersitedestreaming.php" class="btn-ajoutersitedestreaming">Ajouter un site de streaming</a>
            <a href="../views/ajoutermedia.php" class="btn-ajoutermedia">Ajouter un média</a>
            <a href="../views/attachersite.php" class="btn-attachersite">Attacher un site</a>
        <?php endif; ?>
    </header>
    
    <section id="meilleurs-sites">
        <h2>Les meilleurs sites de streaming</h2>
        <div class="sites-container">
            <?php foreach ($sites as $site): ?>
                <div class="site-card">
                    <img src="<?php echo htmlspecialchars($site['image']); ?>" alt="<?php echo htmlspecialchars($site['nom_site']); ?>" class="site-image">
                    <h3><?php echo htmlspecialchars($site['nom_site']); ?></h3>
                    <p><?php echo htmlspecialchars($site['description']); ?></p>
                    <a href="<?php echo htmlspecialchars($site['url']); ?>" target="_blank" class="btn-site">Visiter</a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Section Animés -->
    <section id="animes">
        <h2>Animés</h2>
        <div class="media-container">
            <?php foreach ($animes as $anime): ?>
                <div class="media-card">
                    <img src="<?php echo htmlspecialchars($anime['image']); ?>" alt="<?php echo htmlspecialchars($anime['titre']); ?>" class="media-image">
                    <h3><?php echo htmlspecialchars($anime['titre']); ?></h3>
                    <p><?php echo htmlspecialchars($anime['description']); ?></p>
                    <a href="detailMedia.php?id=<?php echo $anime['id']; ?>" class="btn-media">Voir</a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Section Films -->
    <section id="films">
        <h2>Films</h2>
        <div class="media-container">
            <?php foreach ($films as $film): ?>
                <div class="media-card">
                    <img src="<?php echo htmlspecialchars($film['image']); ?>" alt="<?php echo htmlspecialchars($film['titre']); ?>" class="media-image">
                    <h3><?php echo htmlspecialchars($film['titre']); ?></h3>
                    <p><?php echo htmlspecialchars($film['description']); ?></p>
                    <a href="detailMedia.php?id=<?php echo $film['id']; ?>" class="btn-media">Voir</a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Section Séries -->
    <section id="series">
        <h2>Séries</h2>
        <div class="media-container">
            <?php foreach ($series as $serie): ?>
                <div class="media-card">
                    <img src="<?php echo htmlspecialchars($serie['image']); ?>" alt="<?php echo htmlspecialchars($serie['titre']); ?>" class="media-image">
                    <h3><?php echo htmlspecialchars($serie['titre']); ?></h3>
                    <p><?php echo htmlspecialchars($serie['description']); ?></p>
                    <a href="detailMedia.php?id=<?php echo $serie['id']; ?>" class="btn-media">Voir</a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

</body>
</html>
