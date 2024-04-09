
<?php
require_once 'layout/header.php';
require_once 'data/bdd.php';
$title= "Galerie"; 




?>

<section>
    <div class="container mx-auto">
    <h1 class="font-black text-5xl">PORTRAITS, ILLUSTRATIONS</h1>

        <div class="flex flex-row">
            <?php 
            foreach ($galerie1 as $artwork){ ?>
            
            <div>
                <a href="oeuvre.php?id=<?php echo $artwork['id'] ?>">
                    <img src="assets/img/galerie/<?php echo $artwork['img_url'] ?>" alt="">
                </a>
            </div>

            <?php }?>
        </div>

    </div>
</section>