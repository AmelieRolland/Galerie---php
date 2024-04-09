<?php

require_once __DIR__ . '/../functions/db.php';


$db = getConnection();

$sqlQuery = "SELECT artwork.id, artwork.name, artwork.description, year, artwork_material_id, id_material, id_artwork, material_name, height_cm, width_cm, img_url
FROM artwork
INNER JOIN artwork_material ON artwork_material.id_artwork = artwork.id
INNER JOIN material ON material.id = artwork_material.id_material
GROUP BY artwork.id;";


$artworkStatement = $db->query($sqlQuery);
$galerie1 = $artworkStatement->fetchAll();







?>