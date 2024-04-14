<?php
require_once __DIR__ . '/../classes/User.php';
require_once __DIR__ . '/../functions/db.php';



$pdo = getConnection();
$newUser = new User($pdo);

if (isset($_POST)){
$newUser->insert($_POST);
}

if (!$userStmt) {
    header('Location: sign-up.php');
    exit;
}
header('Location: new-material.php');
    exit;