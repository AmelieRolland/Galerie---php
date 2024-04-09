<?php
require_once 'getMaterials.php';

function getArtwork(int $id):array
{
    $dbservername = 'localhost';
    $dbusername = 'root';
    $dbpassword = '';
    $dbname = 'galerie-website';
    
    $db = new PDO("mysql:host=$dbservername;port=3307;dbname=$dbname;charset=utf8", $dbusername, $dbpassword,[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    
    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sqlQuery = "SELECT artwork.id, artwork.name, artwork.description, year, height_cm, width_cm, img_url
    FROM artwork
    WHERE artwork.id = :id";


    $artworkStatement = $db->prepare($sqlQuery);
    $artworkStatement->execute(['id' => $id]);
    $artworkTab = $artworkStatement->fetch();


    return $artworkTab;
}