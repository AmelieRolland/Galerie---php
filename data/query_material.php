<?php

$dbservername = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'galerie-website';

$db = new PDO("mysql:host=$dbservername;port=3307;dbname=$dbname;charset=utf8", $dbusername, $dbpassword,[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);


$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sqlQuery = "SELECT material_name, material.id
FROM material
INNER JOIN artwork_material ON artwork_material.id_material = material.id
INNER JOIN artwork ON artwork_material.id_artwork = artwork.id
GROUP BY material.id";


$artworkStatement = $db->query($sqlQuery);
$galerie1 = $artworkStatement->fetchAll();







?>