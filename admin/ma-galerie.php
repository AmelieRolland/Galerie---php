<?php

require_once __DIR__ . '/../layout/side-bar.php';
require_once __DIR__ . '/../data/bdd.php';

foreach ($galerie1 as $artwork){ ?>
?>

<!-- Afficher tous les artwork via un select+boucle, et récupérer id pour passer au formulaire d'édit ensuite -->

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="ms-80 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        </thead>
        <tbody>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?php echo $artwork['name'] ?>
                </th>
                <td class="px-6 py-4">
                <img src="../assets/img/galerie/<?php echo $artwork['img_url'] ?>" alt="">
                </td>

                <td class="px-6 py-4">
                    <a href="edit-artwork.php?id=<?php echo $artwork['id'] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Modifier</a>
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Supprimer</a>
                </td>
            </tr>

    
        </tbody>
    </table>
</div>
<?php } ?>