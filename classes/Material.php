<?php
require_once '../functions/utils.php';
require_once __DIR__ . '/NewElmt.php';


class Material extends NewElmt {

    private const REQUIRED_FIELDS = ['material_name'];
    private string $materialName;

    public function __construct($pdo)
    {
        parent:: __construct($pdo, 'material');
    }


    private function hasRequiredFields()
    {
        foreach (self::REQUIRED_FIELDS as $field) {
            if (!isset($this->materialName[$field]) || empty($this->materialName[$field])) {
                return false;
            }
        }

        redirect('new-material.php');
        
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