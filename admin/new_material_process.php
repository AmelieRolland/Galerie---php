<?php
require_once '../classes/Material.php';
require_once __DIR__ . '/../functions/db.php';



$pdo = getConnection();
$newMaterial = new Material($pdo);


$newMaterial->insert($_POST);

if (!$materialStmt) {
    header('Location: new-material.php');
    exit;
}
header('Location: new-material.php');
    exit;