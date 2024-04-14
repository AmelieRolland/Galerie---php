<?php

require_once __DIR__ . '/../classes/Artwork.php';
require_once __DIR__ . '/../functions/db.php';

$id=$_GET['id'];

try {
    $pdo = getConnection();
} catch (PDOException $e) {
    redirect('delete.php');
}
$deleteArtwork= new Artwork($pdo, 'artwork');
$deleteArtwork->delete($id);

if (!$editStmt) {
    header('Location: new-artwork.php');
    exit;
}
header('Location: artwork_registered.php');
    exit;