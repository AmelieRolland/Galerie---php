<?php

require_once __DIR__ . '/../functions/db.php';

$db = getConnection();

$sqlQuery = "SELECT material_name, material.id
FROM material
INNER JOIN artwork_material ON artwork_material.id_material = material.id
INNER JOIN artwork ON artwork_material.id_artwork = artwork.id
GROUP BY material.id";


$artworkStatement = $db->query($sqlQuery);
$galerie1 = $artworkStatement->fetchAll();







?>