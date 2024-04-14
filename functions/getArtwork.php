<?php
require_once __DIR__ . '/getMaterials.php';
require_once __DIR__ . '/db.php';

function getArtwork(int $id):array
{
    $db = getConnection();
    
    $sqlQuery = "SELECT artwork.id, artwork.name, artwork.description, year, height_cm, width_cm, img_url
    FROM artwork
    WHERE artwork.id = :id";


    $artworkStatement = $db->prepare($sqlQuery);
    $artworkStatement->execute(['id' => $id]);
    $artworkTab = $artworkStatement->fetch();


    return $artworkTab;
}