<?php
require_once '../classes/Artwork.php';
require_once __DIR__ . '/../functions/db.php';

$pdo = getConnection();

$newArtwork = new Artwork($pdo);

$newArtwork->insert($_POST);


if (!$artworkStmt) {
    header('Location: new-artwork.php');
    exit;
}
header('Location: artwork_registered.php');
    exit;


