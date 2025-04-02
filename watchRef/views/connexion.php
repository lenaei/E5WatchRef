<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="../styles/connexion.css">
</head>
<body>
    <form action="../controllers/connexion.php" method="POST">
    <h2>Connexion</h2>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button type="submit">Se connecter</button>
        <a href="inscription.html">Pas encore inscrit ? Créez un compte</a>
    </form>

</body>
</html>
