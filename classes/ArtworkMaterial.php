<?php

class ArtworkMaterial
{
  private int $lastId;
  private int $materialId;
  private PDO $pdo;

  public function __construct(int $lastId, int $materialId, PDO $pdo)
  {
    $this->lastId = $lastId;
    $this->materialId = $materialId;
    $this->pdo = $pdo;
  }


    public function insert($lastId, $materialId)
    {
        $insertArtMat = " INSERT INTO artwork_material(id_artwork, id_material)
        VALUES (:id_artwork, :id_material)";

        $materialStmt = $this->pdo->prepare($insertArtMat);

        $materialStmt->execute(
            [
                ':id_artwork' => $lastId,
                ':id_material' => $materialId,

            ]
        );
    }
    
    
}