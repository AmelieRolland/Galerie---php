<?php
require_once __DIR__ . '/../classes/User.php';
require_once __DIR__ . '/../functions/db.php';



try {
    $pdo = getConnection();
} catch (PDOException $e) {
    redirect('contact.php');
}$newUser = new User($pdo);

if (!isset($_POST['firstname']) || ($_POST['lastname']) || ($_POST['email']) || ($_POST['password']))
{
    $requiredError = new RequiredFields();
    $_SESSION['error_message'] = $requiredError->getErrorMessage();
    redirect('sign-in.php');
}
$newUser->insert($_POST);


if (!$userStmt) {
    header('Location: sign-up.php');
    exit;
}
header('Location: new-material.php');
    exit;