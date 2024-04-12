<?php
require_once __DIR__ . '/../classes/User.php';
require_once __DIR__ . '/../functions/db.php';



$pdo = getConnection();

if (isset ($_POST['email']) && ($_POST['password'])){

    foreach ($users as $user) {
        if (
            $user['email'] === $_POST['email'] &&
            $user['password'] === $_POST['password']
        ) {
            $userConnected = [
                'email' => $user['email'],
            ];
        }

}

}
header('Location: admin.php');
    exit;