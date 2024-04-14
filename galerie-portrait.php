
<?php
require_once 'layout/header.php';
require_once 'functions/db.php';
require_once 'functions/getIdMaterial.php';
require_once  'data/query_new_material.php';


$title= "Galerie"; 
$pdo = getConnection();

if (isset($_GET['material']))
{
$materialName= $_GET['material'];
$materialId = getIdMaterial($materialName);



//faire requete dans artwork_material result= where id_material = :materialId

$query = "SELECT DISTINCT *
FROM artwork_material
INNER JOIN artwork ON artwork_material.id_artwork = artwork.id
WHERE id_material = :materialId";

$stmt = $pdo->prepare($query);
$stmt->execute([':materialId' => $materialId]);

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>

<section>
    <div class="container mx-auto">
    <h1 class="font-black text-5xl mt-10">PORTRAITS, ILLUSTRATIONS</h1>


    <div class="flex items-center justify-center py-4 md:py-8 flex-wrap">
  
    <form method="get">
    <input type="submit" name='todo' class="text-blue-700 hover:text-white border border-blue-600 bg-white hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:bg-gray-900 dark:focus:ring-blue-800" value = 'tout voir'>

    <?php foreach ($galerie1 as $material){ ?>

    <input type="submit" name="material" class="text-gray-900 border border-white hover:border-gray-200 dark:border-gray-900 dark:bg-gray-900 dark:hover:border-gray-700 bg-white focus:ring-4 focus:outline-none focus:ring-gray-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 dark:text-white dark:focus:ring-gray-800" value= "<?php echo $material['material_name'] ?>">

    <?php } ?>
    </form>
</div>

 

<div class="grid lg:grid-cols-4 md:grid-cols-3sm:grid-cols-1 gap-4">
    
<?php 
if (isset($_GET['material'])){
    foreach ($result as $artwork){ ?>
        <div>
            <a href="oeuvre.php?id=<?php echo $artwork['id'] ?>">
                <img class="w-full h-auto max-w-full rounded-lg" src="assets/img/galerie/<?php echo $artwork['img_url'] ?>" alt="<?php echo $artwork['name'] ?>">
            </a>
        </div>
        <?php } } else{
            require_once 'data/bdd.php';


            foreach ($galerie1 as $artworks){ ?>
    <div>
        <a href="oeuvre.php?id=<?php echo $artworks['id'] ?>">
            <img class="w-full h-auto max-w-full rounded-lg" src="assets/img/galerie/<?php echo $artworks['img_url'] ?>" alt="<?php echo $artworks['name'] ?>">
        </a>
    </div>
    <?php } }?>

   
</div>



    </div>
</section>