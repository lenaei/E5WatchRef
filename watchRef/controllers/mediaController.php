<?php
require_once '../models/database.php';

// Fonction pour récupérer tous les médias
function getAllMedias() {
    global $pdo;
    $query = "SELECT * FROM medias ORDER BY titre";
    $stmt = $pdo->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Récupérer un média par son ID
function getMediaById($id) {
    global $pdo;
    $query = "SELECT * FROM medias WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Récupérer les sites associés à un média
function getSitesByMedia($media_id) {
    global $pdo;
    $query = "SELECT s.* FROM sites_streaming s
              JOIN media_sites ms ON s.id = ms.site_id
              WHERE ms.media_id = :media_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':media_id', $media_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Attacher un site à un média
function attachSiteToMedia($media_id, $site_id) {
    global $pdo;
    
    try {
        $query = "INSERT IGNORE INTO media_sites (media_id, site_id) VALUES (:media_id, :site_id)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':media_id', $media_id, PDO::PARAM_INT);
        $stmt->bindParam(':site_id', $site_id, PDO::PARAM_INT);
        $stmt->execute();

        return ["success" => "Site attaché avec succès"];
    } catch (PDOException $e) {
        return ["error" => "Erreur lors de l'attachement : " . $e->getMessage()];
    }
}

// Gestion de la soumission du formulaire
if (isset($_GET['action']) && $_GET['action'] === 'attach') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $media_id = $_POST['media_id'];
        $site_id = $_POST['site_id'];

        if (!empty($media_id) && !empty($site_id)) {
            $result = attachSiteToMedia($media_id, $site_id);
            
            if (isset($result['error'])) {
                header('Location: ../views/attacherSite.php?error=' . urlencode($result['error']));
            } else {
                header('Location: ../views/catalogue.php?success=' . urlencode($result['success']));
            }
        } else {
            header('Location: ../views/attacherSite.php?error=' . urlencode("Veuillez sélectionner un média et un site"));
        }
        exit;
    }
}
?>
