<?php

require_once __DIR__ . '/../functions/db.php';

$pdo=getConnection();

$sqlQuery = "SELECT id, firstname, lastname, email, subject, message, date
FROM contact_form";


$stmtContact = $pdo->query($sqlQuery);
$contactRequests = $stmtContact->fetchAll(PDO::FETCH_ASSOC);