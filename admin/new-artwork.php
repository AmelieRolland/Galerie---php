<?php

require_once __DIR__ . '/../layout/side-bar.php';
require_once '../data/query_new_material.php';


?>

<h1 class="ms-80 font-black text-5xl mt-40 mb-20">ENREGISTRER UNE NOUVELLE OEUVRE</h1>

<form method="post" enctype="multipart/form-data" action="new_artwork_process.php">

<div class="mb-6 ms-80">
    <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900">Nom de l'oeuvre</label>
    <input type="text" name="name" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
</div>

<label class="block mb-2 text-sm font-medium text-white-900 dark:text-white" for="file_input">Upload file</label>
<input type="file" name="img_url" class="block ms-80 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">
<p class="mt-1 text-sm text-gray-500" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>



<!-- <div class="mb-6 ms-80">
    <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900">Nom de l'oeuvre</label>
    <input type="text" name="img_url" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
</div> -->

<label for="countries" class="block ms-80 mb-2 text-sm font-medium text-gray-900">Techniques</label>



<div class="flex items-center ms-80 mb-16">
<?php 
            foreach ($galerie1 as $material){ ?>
    <input checked id="checkbox" name="material_name[]" type="checkbox" value="<?php echo $material['material_name'] ?>" class="w-4 h-4 pe-6 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
    <label for="checked-checkbox" class="ms-2 text-sm font-medium text-gray-900 pe-6"><?php echo $material['material_name'] ?></label>
    <?php }
    ?>
</div>





<div class="flex">
    <div class="mb-6 ms-80">
        <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 ">Hauteur (en cm)</label>
        <input type="text" name="height_cm" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-40 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>

    <div class="mb-6 ms-12">
        <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 ">Largeur (en cm)</label>
        <input type="text" name="width_cm" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-50 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
</div>

<div class="mb-6 ms-80">
        <label for="default-input" class="block mb-2 text-sm font-medium text-gray-900 ">Année</label>
        <input type="text" name="year" id="default-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-50 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>

<label for="message" class="ms-80 block mb-2 text-sm font-medium text-gray-900">Description</label>
<textarea id="message" name="description" rows="4" class="ms-80 block p-2.5 w-96 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>

<div><input class="ms-80 block mb-2 text-sm font-medium text-gray-900" type="submit" value="Envoyer" />Envoyer</div>
