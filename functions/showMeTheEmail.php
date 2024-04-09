<?php
require_once __DIR__ . '/db.php';

function getEmail(int $id):array
{

    $pdo=getConnection();

    $sqlQuery = "SELECT *
    FROM contact_form
    WHERE contact_form.id = :id";


    $emailStmt = $pdo->prepare($sqlQuery);
    $emailStmt->execute(['id' => $id]);
    $fullEmail = $emailStmt->fetch();


    return $fullEmail;
}