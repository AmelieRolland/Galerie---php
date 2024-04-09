<?php
require_once '../classes/Artwork.php';
require_once __DIR__ . '/../functions/db.php';


$newArtwork = new Artwork($_POST);

$db = getConnection();

$insertMaterial = 'INSERT INTO material(material_name)
VALUES (:material_name)';

$newMaterial = $_POST['material_name'];

$materialStmt = $db->prepare($insertMaterial);
$materialStmt->execute(
    [
        'material_name'=>$newMaterial
    ]
    );

if (!$materialStmt) {
    header('Location: new_material.php');
    exit;
}
header('Location: new-material.php');
    exit;