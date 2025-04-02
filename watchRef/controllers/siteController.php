<?php

// Fonction pour récupérer tous les sites de streaming
function getAllSites() {
    global $pdo;

    $query = "SELECT * FROM sites_streaming";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


?>