<?php
require_once __DIR__ . '/db.php';


 function getLastId()
{
    $pdo=getConnection();
    $queryId = "SELECT MAX(id) AS lastId FROM artwork";
    $stmt = $pdo->query($queryId);
    $lastId = $stmt->fetch();

    return $lastId['lastId'];
}
