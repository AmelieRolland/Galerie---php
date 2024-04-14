<?php
require_once __DIR__ . '/db.php';


function getMaterials(int $id):array
{
    
    $db = getConnection();

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