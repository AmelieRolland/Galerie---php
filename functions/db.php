<?php

function getConnection(): PDO
{
    [
        'DB_HOST'     => $host,
        'DB_PORT'     => $port,
        'DB_NAME'     => $dbName,
        'DB_CHARSET'  => $charset,
        'DB_USER'     => $dbUser,
        'DB_PASSWORD' => $dbPassword
    ] = parse_ini_file(__DIR__ . '/../config/db.ini');

    $dsn = "mysql:host=$host;port=$port;dbname=$dbName;charset=$charset";

    $pdo = new PDO(
        $dsn,
        $dbUser,
        $dbPassword,
        [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
    return $pdo;
}