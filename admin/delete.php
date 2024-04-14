<?php

require_once __DIR__ . '/../layout/side-bar.php';
require_once __DIR__ . '/../data/bdd.php';
require_once __DIR__ . '/../functions/getArtwork.php';

$id=$_GET['id'];
$artworkFile = getArtwork($id);

?>
<div class="ms-80 mt-28">
    <p class="font-black text-2xl">Êtes vous sur.e de vouloir supprimer cette oeuvre?</p>
</div>
<h1 class="ms-80 font-black text-5xl mt-10 mb-16"><?php echo $artworkFile['name'] ?></h1>
<img class="ms-80 mb-12" src="../assets/img/galerie/<?php echo $artworkFile['img_url'] ?>" alt="<?php echo $artworkFile['name'] ?>">

<a href="delete_process.php?id=<?php echo $artworkFile['id'] ?>" class="ms-80 font-medium px-10 py-3 bg-red-500 text-blue-600 dark:text-white">OUI</a>


<?php require_once __DIR__ . '/../layout/footer.php';  ?>
