<?php

require_once __DIR__ . '/NewElmt.php';

 class User extends NewElmt {

    private const REQUIRED_FIELDS = ['name', 'year', 'height_cm', 'width_cm', 'description', 'img_url'];
    private array $userFields;

    public function __construct($pdo)
    {
        parent:: __construct($pdo, 'user');
    }

    
    public function insert($post)
    {

        $hashedPassword = password_hash($post['password'], PASSWORD_BCRYPT);

        $insertUser = " INSERT INTO " . $this->tableName . "(surname, firstname, email, password)
        VALUES (:surname, :firstname, :email, :password)";

        $userStmt = $this->pdo->prepare($insertUser);

        $userStmt->execute(
            [
                'surname'=>$post['surname'],
                'firstname'=>$post['firstname'],
                'email'=>$post['email'],
                'password'=>$hashedPassword
            
            ]
            );
    }


}