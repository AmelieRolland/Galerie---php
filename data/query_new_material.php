<?php

require_once __DIR__ . '/../functions/db.php';

$db = getConnection();
$sqlQuery = "SELECT material_name, material.id
FROM material";


$stmt = $db->query($sqlQuery);
$galerie1 = $stmt->fetchAll();