<?php

require_once __DIR__ . '/../functions/db.php';
require_once __DIR__ . '/../functions/utils.php';



//connection à la bdd
try {
    $pdo = getConnection();
} catch(PDOException $e) {
    redirect('sign-in.php');
}


//verifications, early pattern

if (empty($_POST)) {
    redirect('sign-in.php');
}


$email = $_POST['email'];
$loginPassword = $_POST['password'];


if (empty($email) || empty($loginPassword) == true) {
    redirect('sign-in.php');
}


$stmt = $pdo->prepare('SELECT * FROM user WHERE email = :email');

$stmt->bindValue('email', $email);
$stmt->execute();

//fetch retourne bool
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user === false) { 
    redirect('sign-in.php');
}

//verification du password version hashed
$passwordHashed = $user['password'];
$passwordVerified = password_verify($loginPassword, $passwordHashed);

if (!$passwordVerified) {
    redirect('sign-in.php');
}
session_start();
$_SESSION['connected'] = true;

$_SESSION['user'] = [
    'id' => $user['id'],
    'firstname' => $user['firstname'],
];

redirect('ma-galerie.php');
