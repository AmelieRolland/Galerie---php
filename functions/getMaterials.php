<?php


function getMaterials(int $id):array
{
    $dbservername = 'localhost';
    $dbusername = 'root';
    $dbpassword = '';
    $dbname = 'galerie-website';
    
    $db = new PDO("mysql:host=$dbservername;port=3307;dbname=$dbname;charset=utf8", $dbusername, $dbpassword,[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    
    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sqlQuery = 'SELECT material_name
    FROM material
    INNER JOIN artwork_material ON artwork_material.id_material = material.id
    INNER JOIN artwork ON artwork.id = artwork_material.id_artwork
    WHERE id_artwork = :id';


    $materialStatement = $db->prepare($sqlQuery);
    $materialStatement->execute(['id' => $id]);
    $materials = $materialStatement->fetchAll();

 
        return $materials;

    




}