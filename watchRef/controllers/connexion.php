<?php
require '../models/database.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    // Préparer la requête SQL pour rechercher l'utilisateur dans la base de données
    $stmt = $pdo->prepare("SELECT id, nom, prenom, email, password, role FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérification du mot de passe
    if ($user && password_verify($password, $user["password"])) {
        // Sauvegarde des informations de l'utilisateur dans la session
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["nom"] = $user["nom"];
        $_SESSION["prenom"] = $user["prenom"];
        $_SESSION["email"] = $user["email"];
        $_SESSION["role"] = $user["role"]; // Ajout du rôle ici

        // Redirection vers la page des annonces
        header("Location: ../views/catalogue.php");
        exit();
    } else {
        // Message d'erreur en cas de mauvaise connexion
        echo "Email ou mot de passe incorrect.";
    }
}
?>
