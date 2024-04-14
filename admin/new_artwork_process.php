<?php
require_once '../classes/ArtworkMaterial.php';
require_once '../classes/Artwork.php';

require_once __DIR__ . '/../functions/db.php';
require_once __DIR__ . '/../functions/getLastArtworkID.php';
require_once __DIR__ . '/../functions/getIdMaterial.php';



try {
    $pdo = getConnection();
} catch (PDOException $e) {
    redirect('contact.php');
}

//insertion des données de la nouvelle oeuvre:
$newArtwork = new Artwork($pdo, 'artwork', $_FILES);

$newArtwork->insert($_POST);

//je récupère son id dans sa table pour pouvoir l'enregistrer aussi dans la table de jointure:
$lastArtworkId = getLastId();

//je récupere les matériaux sélectionnés dans le formulaire, pour les enregistrer chacun associé à l'id de l'oeuvre
//dans la table de jointure:

foreach ($_POST['material_name'] as $material){

    $materialId=getIdMaterial($material);
    $newArtworkMaterial = new ArtworkMaterial($lastArtworkId, $materialId, $pdo);
    $newArtworkMaterial->insert($lastArtworkId, $materialId);
}



if (!$materialStmt) {
    header('Location: new-artwork.php');
    exit;
}
header('Location: artwork_registered.php');
    exit;


