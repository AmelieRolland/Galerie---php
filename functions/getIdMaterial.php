<?php
require_once __DIR__ . '/db.php';

function getIdMaterial($materialName){
    
$db = getConnection();

$sqlQuery = "SELECT material.id AS matId
FROM material
WHERE material_name = :material_name";


 $stmt = $db->prepare($sqlQuery);
  $stmt->execute([':material_name' => $materialName]);
  
  $materialId = $stmt->fetch(PDO::FETCH_ASSOC);

return $materialId['matId'];


}