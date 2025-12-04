<?php
require_once 'models/Artis.php';
require_once 'config/Database.php';

class ArtisViewModel {
    private $model;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->model = new Artis($db);
    }

    public function showAllArtis() {
        $stmt = $this->model->read();
        $data = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data; // Data dikembalikan ke View 
    }

    public function addArtis($nama, $genre, $asal) {
        $this->model->nama_artis = $nama;
        $this->model->genre = $genre;
        $this->model->asal_negara = $asal;
        return $this->model->create();
    }

    public function getArtisById($id) {
        return $this->model->getById($id);
    }

    public function updateArtis($id, $nama, $genre, $asal) {
        $this->model->nama_artis = $nama;
        $this->model->genre = $genre;
        $this->model->asal_negara = $asal;
        return $this->model->update($id);
    }
    
    public function deleteArtis($id) {
        return $this->model->delete($id);
    }
}
?>