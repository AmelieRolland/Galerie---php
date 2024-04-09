<?php
require_once __DIR__ . '/../functions/utils.php';
require_once __DIR__ . '/../functions/db.php';


class Artwork {

    private const REQUIRED_FIELDS = ['name', 'year', 'height_cm', 'width_cm', 'description', 'img_url'];
    private array $artworkFields;

    public function __construct($artworkFields)
    {
        $this->artworkFields = $artworkFields;
    }


    private function hasRequiredFields()
    {
        foreach (self::REQUIRED_FIELDS as $field) {
            if (!isset($this->artworkFields[$field]) || empty($this->artworkFields[$field])) {
                return false;
            }
        }

        redirect('new-artwork.php');
        
    }


    
}
