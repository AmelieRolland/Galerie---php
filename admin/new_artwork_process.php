<?php
require_once '../classes/Artwork.php';
require_once __DIR__ . '/../functions/db.php';


$newArtwork = new Artwork($_POST);

$db = getConnection();

$sqlQuery = "SELECT artwork.id, artwork.name, artwork.description, year, artwork_material_id, id_material, id_artwork, material_name, height_cm, width_cm, img_url
FROM artwork
INNER JOIN artwork_material ON artwork_material.id_artwork = artwork.id
INNER JOIN material ON material.id = artwork_material.id_material";

$insertArtwork = 'INSERT INTO artwork(name, year, height_cm, width_cm, description, img_url)
VALUES (:name, :year, :height_cm, :width_cm, :description, :img_url)';

$newName = $_POST['name'];
$newYear = $_POST['year'];
$newHeight = $_POST['height_cm'];
$newWidth = $_POST['width_cm'];
$newDescription = $_POST['description'];
$newImg = $_POST['img_url'];

$artworkStmt = $db->prepare($insertArtwork);
$artworkStmt->execute(
    [
        'name'=>$newName,
        'year'=>$newYear,
        'height_cm'=>$newHeight,
        'width_cm'=>$newWidth,
        'description'=>$newDescription,
        'img_url'=>$newImg
    ]
    );

if (!$artworkStmt) {
    header('Location: new_artwork.php');
    exit;
}
header('Location: artwork_registered.php');
    exit;


