<?php
require_once __DIR__ . '/db.php';

function getIdMaterial(){
    
$db = getConnection();

$sqlQuery = "SELECT material.id
FROM material
WHERE  'material_name = :material_name";


$stmt = $db->query($sqlQuery);
$materialId = $stmt->fetch();

return $materialId;


}