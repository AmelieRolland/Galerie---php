<?php

$dbservername = 'localhost';
$dbusername = 'root';
$dbpassword = '';
$dbname = 'galerie-website';

$db = new PDO("mysql:host=$dbservername;port=3307;dbname=$dbname;charset=utf8", $dbusername, $dbpassword,[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);


$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sqlQuery = "SELECT material_name, material.id
FROM material";


$stmt = $db->query($sqlQuery);
$galerie1 = $stmt->fetchAll();