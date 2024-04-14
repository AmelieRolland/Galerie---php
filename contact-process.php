<?php
require_once 'functions/db.php';

if (empty($_POST)) {
    header('Location: index.php');
    exit;
}

//eviter toute injection de code malveillant dans la messagerie
$_POST['message'] = htmlspecialchars(strip_tags($_POST['message']));


//créer une fonction pour vérifier validité des données

try {
    $pdo = getConnection();
} catch (PDOException $e) {
    header('Location: index.php');
    exit;
}

$sql= 'INSERT INTO contact_form(firstname, lastname, email, subject, message)
        VALUES(:firstname, :lastname, :email, :subject, :message)';



            $newFirstname = $_POST['firstname'];
            $newLastname = $_POST['lastname'];
            $newEmail = $_POST['email'];
            $newSubject = $_POST['subject'];
            $newMessage = $_POST['message'];


            $contactStmt = $pdo->prepare($sql);

            $contactStmt->execute(
                [
                    'firstname'=> $newFirstname,
                    'lastname'=> $newLastname,
                    'email'=> $newEmail,
                    'subject'=> $newSubject,
                    'message'=> $newMessage

                ]
            );
            header("Location:index.php");

if (!$contactStmt) {
    header('Location: index.php');
    exit;
}
header('Location: index.php');
    exit;
        