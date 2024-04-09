<?php
require_once '../functions/utils.php';

class Material {

    private const REQUIRED_FIELDS = ['material_name'];
    private array $materialFields;

    public function __construct($materialFields)
    {
        $this->materialFields = $materialFields;
    }


    private function hasRequiredFields()
    {
        foreach (self::REQUIRED_FIELDS as $field) {
            if (!isset($this->materialFields[$field]) || empty($this->materialFields[$field])) {
                return false;
            }
        }

        redirect('new-material.php');
        
    }

    
}