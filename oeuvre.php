<?php
require_once 'layout/header.php';
require_once 'data/bdd.php';
require_once 'functions/getArtwork.php';
require_once 'functions/getMaterials.php';


$id=$_GET['id'];
$artworkFile = getArtwork($id);
$materials=getMaterials($id);


?>
<body>
<?php 
require_once 'layout/navbar.php';
?>

<div class="container mx-auto">
    

    <div class="columns-2 flex flex-row h-full mt-40">

        <div class="flex flex-col justify-end">
            <img src="assets/img/galerie/<?php echo $artworkFile['img_url'] ?>" alt="">
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