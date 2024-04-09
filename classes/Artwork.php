<?php
require_once __DIR__ . '/../functions/utils.php';
require_once __DIR__ . '/NewElmt.php';


class Artwork extends NewElmt 
{

    private const REQUIRED_FIELDS = ['name', 'year', 'height_cm', 'width_cm', 'description', 'img_url'];
    private array $artworkFields;

    public function __construct($pdo)
    {
        parent:: __construct($pdo, 'artwork');
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

    public function insert($post)
    {
        $insertArtwork = " INSERT INTO " . $this->tableName . "(name, year, height_cm, width_cm, description, img_url)
        VALUES (:name, :year, :height_cm, :width_cm, :description, :img_url)";

        $artworkStmt = $this->pdo->prepare($insertArtwork);

        $artworkStmt->execute(
            [
                'name'=>$post['name'],
                'year'=>$post['year'],
                'height_cm'=>$post['height_cm'],
                'width_cm'=>$post['width_cm'],
                'description'=>$post['description'],
                'img_url'=>$post['img_url']
            
            ]
            );
    }


    
}

