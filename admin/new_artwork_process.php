<?php
require_once '../classes/ArtworkMaterial.php';
require_once '../classes/Artwork.php';

require_once __DIR__ . '/../functions/db.php';
require_once __DIR__ . '/../functions/getLastArtworkID.php';
require_once __DIR__ . '/../functions/getIdMaterial.php';



$pdo = getConnection();

//insertion des données de la nouvelle oeuvre:
$newArtwork = new Artwork($pdo);

$newArtwork->insert($_POST);

//je récupère son id dans sa table pour pouvoir l'enregistrer aussi dans la table de jointure:
$lastArtworkId = getLastId();

//je récupère l'id du/des matériaux sélectionnés :

// $materials = $_POST['material_name'];


foreach ($_POST['material_name'] as $material){

    $materialId=getIdMaterial($material);
    $newArtworkMaterial = new ArtworkMaterial($lastArtworkId, $materialId, $pdo);
    $newArtworkMaterial->insert($lastArtworkId, $materialId);
}





if (!$artworkStmt) {
    header('Location: new-artwork.php');
    exit;
}
header('Location: artwork_registered.php');
    exit;


