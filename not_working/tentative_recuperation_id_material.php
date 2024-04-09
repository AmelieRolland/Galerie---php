<?php

//TENTATIVE DE RECUPERATION DE ID QUI CORRESPOND AU 'material_name' DE LA BDD
$materialName=$_POST['material_name'];

    $queryMat = "SELECT material.id
    FROM material
    WHERE  'material_name = $materialName";
    
    
    // $artworkStatement = $db->query($sqlQuery);
    // $materialId = $artworkStatement->fetchAll();

    $matStatement = $db->prepare($queryMat);
    $matStatement->execute(['material_name' => $materialName]);
    $materialId = $artworkStatement->fetch();
    ?>

<div class="ms-80">
    <?php var_dump($materialId); ?>
    </div>