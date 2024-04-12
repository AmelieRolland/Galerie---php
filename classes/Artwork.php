<?php
require_once __DIR__ . '/../functions/utils.php';


class Artwork 
{
    const UPLOAD_DIR = "__DIR__ . '/../assets/img/galerie/'";
    private const REQUIRED_FIELDS = ['name', 'year', 'height_cm', 'width_cm', 'description', 'img_url'];
    private array $artworkFields;


        public function __construct(
            private PDO $pdo,
            private string $tableName, 
            private ?array $file = [])
            {
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

    //ecrire fonction findFile($file) pour récupérer le 'name' de $_FILES
    //return $fileName
    //et dans la fonction insert ajouter this->filename
    private function findFile()
    {
        $img_url = $this->file['img_url'];

        $uploadedImgInfo = pathinfo($img_url['name']);
        $uploadedImgName = $uploadedImgInfo['filename'];
        $uploadedImgExt = $uploadedImgInfo['extension'];
        $randomStr = randomStr(5);
        return $uploadedImgName . $randomStr . "." . $uploadedImgExt;
        
    }


    public function insert($post)
    {
        $imgFile = Artwork::findFile($this->file);

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
                'img_url' => $imgFile
            ]
            );
            $destinationPath = __DIR__ . '/../assets/img/galerie/' . $imgFile;
            if (!move_uploaded_file($this->file['img_url']['tmp_name'], $destinationPath)) {
            throw new Exception('Failed to move uploaded file.');
}

    }

    public function edit($post)
    {
        $editArtwork = "UPDATE $this->tableName SET name=:name, year=:year, height_cm=:height_cm,
        width_cm=:width_cm, description=:description WHERE id=:id";

        $editStmt = $this->pdo->prepare($editArtwork);

        $editStmt->execute(
            [
                'id' =>$post['id'],
                'name'=>$post['name'],
                'year'=>$post['year'],
                'height_cm'=>$post['height_cm'],
                'width_cm'=>$post['width_cm'],
                'description'=>$post['description']
            ]
            );
    }




    
}

