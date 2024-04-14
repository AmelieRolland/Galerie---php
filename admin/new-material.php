<?php

require_once __DIR__ . '/../layout/side-bar.php';
// require_once '../data/query_material.php';


?>

<h1 class="ms-80 font-black text-5xl mt-40 mb-20">ENREGISTRER NOUVELLE TECHNIQUE</h1>

<form method="post" action="new_material_process.php">

<div class="mb-6 ms-80">
    <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900">Nom de la technique</label>
    <input type="text" name="material_name" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
</div>







<div><input class="ms-80 block mb-2 text-sm font-medium text-gray-900" type="submit" value="Envoyer" />Envoyer</div>

<?php require_once __DIR__ . '/../layout/footer.php';  ?>
