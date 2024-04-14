<?php
require_once '../functions/utils.php';
require_once __DIR__ . '/NewElmt.php';


class Material extends NewElmt {

    private string $materialName;

    public function __construct($pdo)
    {
        parent:: __construct($pdo, 'material');
    }


    public function insert($post)
    {
        $insertMaterial = " INSERT INTO " . $this->tableName . "(material_name)
        VALUES (:material_name)";

        $materialStmt = $this->pdo->prepare($insertMaterial);

        $materialStmt->execute(
            [
                'material_name' => $post['material_name']
            ]
        );
    }

    
}