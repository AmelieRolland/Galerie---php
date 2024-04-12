<?php

require_once __DIR__ . '/../classes/Artwork.php';

require_once __DIR__ . '/../functions/db.php';

$pdo = getConnection();

$editArtwork = "UPDATE artwork SET name=:name, year=:year, height_cm=:height_cm,
        width_cm=:width_cm, description=:description WHERE id=:id";

        $editStmt = $pdo->prepare($editArtwork);

        $editStmt->execute(
            [
                'id' =>$_POST['id'],
                'name'=>$_POST['name'],
                'year'=>$_POST['year'],
                'height_cm'=>$_POST['height_cm'],
                'width_cm'=>$_POST['width_cm'],
                'description'=>$_POST['description']
            ]
            );


if (!$editStmt) {
    header('Location: new-artwork.php');
    exit;
}
header('Location: artwork_registered.php');
    exit;