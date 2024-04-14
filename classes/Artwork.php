<?php
require_once __DIR__ . '/../functions/utils.php';


class Artwork 
{
    const UPLOAD_DIR = "__DIR__ . '/../assets/img/galerie/'";


        public function __construct(
            private PDO $pdo,
            private string $tableName, 
            private ?array $file = [])
            {
        }
    


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

    public function delete($id)
    {
        //d'abord supprimer l'oeuvre dans la table artwork_material, car elle contient systematiquement
        //une clé étrangère de l'artwork qu'on voudra supprimer :

        $deleteMaterialArtwork = "DELETE FROM artwork_material WHERE id_artwork = :id";
        $deleteMatArtStmt = $this->pdo->prepare($deleteMaterialArtwork);
        $deleteMatArtStmt->execute(['id' => $id]);

        //Ensuite je peux appliquer la requete de suppression de l'artwork :

        $deleteArtwork = "DELETE FROM $this->tableName WHERE id = :id";
        $deleteStmt = $this->pdo->prepare($deleteArtwork);
        $deleteStmt->execute(['id' => $id]);

        //gerer le cas d'erreur mais inverser pour le early pattern
        if ($deleteMatArtStmt->rowCount() > 0 && $deleteStmt->rowCount() > 0) {
      
            echo "L'oeuvre et les liens de matériaux associés ont été supprimés avec succès.";
        } else {
            echo "Erreur lors de la suppression de l'oeuvre et des liens de matériaux associés.";
        }

    }





    
}

