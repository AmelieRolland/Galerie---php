<?php

require_once 'layout/header.php';
require_once 'data/bdd.php';
require_once 'functions/getArtwork.php';
require_once 'functions/getMaterials.php';


$id=$_GET['id'];
$artworkFile = getArtwork($id);
$materials=getMaterials($id);

$title= "fiche";
require_once __DIR__ . '/layout/header.php';


?>
<body>
<?php 
require_once 'layout/navbar.php';
?>
<div class="container mx-auto">
    
<a href="galerie-portrait.php" class="pt-12 text-1xl">Retourner à la galerie</a>

    <div class="columns-2 flex flex-row h-full mt-40">

        <div class="w-2/4 h-auto flex flex-col justify-end">
            <img class="w-full h-auto" src="assets/img/galerie/<?php echo $artworkFile['img_url'] ?>" alt="">
        </div>

        <div class="flex flex-col justify-items-center ms-32 h-100">
            <h1 class="font-black text-6xl"><?php echo $artworkFile['name']?></h1>

            <p class="pt-12 text-lg italic"><?php echo $artworkFile['description']?></p>
        

            
            <p class="pt-6 text-lg">
            <?php foreach ($materials as $material){ ?>
            
               -  <?php echo $material['material_name'] ?></p> 
                
                <?php } ?>

            
            <p class="pt-6 text-lg"><?php echo $artworkFile['height_cm'] . " x " . $artworkFile['width_cm'] . " cm"?></p>

            <p class="pt-6 text-lg"><?php echo $artworkFile['year']?></p>

        </div>
    </div>

</div>

<?php require_once 'layout/footer.php';  ?>