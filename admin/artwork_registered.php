<?php
require_once __DIR__ . '/../functions/getLastArtworkID.php';
?>

<div><p class="ms-80 font-black text-5xl mt-40 mb-20">OEUVRE BIEN ENREGISTREE 
    <?php 
$lastId = getLastId();
    var_dump($lastId) ?>
</p></div>

<?php
require_once 'new-artwork.php'; ?>

