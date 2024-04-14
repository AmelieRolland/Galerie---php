<?php

require_once __DIR__ . '/../layout/side-bar.php';
require_once __DIR__ . '/../data/bdd.php';


?>


<?php
    if($_SESSION['connected'] = true) {
?>

<h1 class="ms-80 my-20 font-black text-4xl">Welcome back, <?php echo $_SESSION['user']['firstname']  ?> ♡</h1>
<?php } ?>
<!-- Afficher tous les artwork via un select+boucle, et récupérer id pour passer au formulaire d'édit ensuite -->
<a href="new-artwork.php"class="py-6 px-16 bg-red-600 mt-20 ms-80 font-black text-2xl">Ajouter une oeuvre</a>

<?php foreach ($galerie1 as $artwork){ ?>


<div class="mb- mt-20 relative overflow-x-auto sm:rounded-lg">
    <table class="ms-80 w-9/12 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-red-50 dark:bg-gray-700 dark:text-gray-400">
        </thead>
        <tbody>
            <tr class=" odd:bg-white odd:dark:bg-red-100 even:bg-gray-50 even:dark:bg-gray-800 ">
                <th scope="row" class="px-6 py-4 text-lg text-gray-900 whitespace-nowrap dark:text-black">
                    "<?php echo $artwork['name'] ?>"
                </th>
                <td class="px-6 py-4">
                <img class="w-40" src="../assets/img/galerie/<?php echo $artwork['img_url'] ?>" alt="">
                </td>

                <td class="px-6 py-4">
                    <a href="edit-artwork.php?id=<?php echo $artwork['id'] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Modifier</a>
                </td>
                <td class="px-6 py-4">
                    <a href="delete.php?id=<?php echo $artwork['id'] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Supprimer</a>
                </td>
            </tr>

    
        </tbody>
    </table>
</div>
<?php } ?>