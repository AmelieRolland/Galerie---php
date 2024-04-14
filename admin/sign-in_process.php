<?php
session_start();
require_once __DIR__ . '/../functions/db.php';
require_once __DIR__ . '/../functions/utils.php';
require_once __DIR__ . '/../classes/ErrorResponses/InvalidEmail.php';
require_once __DIR__ . '/../classes/ErrorResponses/RequiredFields.php';



//connection à la bdd
try {
    $pdo = getConnection();
} catch(PDOException $e) {
    redirect('sign-in.php');
}
$email = $_POST['email'];
$loginPassword = $_POST['password'];

//verifications, early pattern
if (empty($email) || filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    $invalid = new InvalidEmail();
    $_SESSION['error_message'] = $invalid->getErrorMessage();
    redirect('sign-in.php');
}
  
if (empty($_POST)) {
    $requiredError = new RequiredFields();
    $_SESSION['error_message'] = $requiredError->getErrorMessage();
    redirect('sign-in.php');
}





if (empty($email) || empty($loginPassword) == true) {
    $requiredError = new RequiredFields();
    $_SESSION['error_message'] = $requiredError->getErrorMessage();
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

