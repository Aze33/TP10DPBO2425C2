<?php
require_once 'models/Konser.php';
require_once 'models/Artis.php'; 
require_once 'models/Venue.php'; 
require_once 'config/Database.php';

class KonserViewModel {
    private $model;
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->model = new Konser($this->db);
    }

    public function showAllKonser() {
        $stmt = $this->model->read();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Untuk mengisi data dropdown di Form
    public function getArtisList() {
        $artisModel = new Artis($this->db);
        $stmt = $artisModel->read();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getVenueList() {
        $venueModel = new Venue($this->db);
        $stmt = $venueModel->read();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addKonser($nama, $tgl, $harga, $id_artis, $id_venue) {
        $this->model->nama_event = $nama;
        $this->model->tanggal = $tgl;
        $this->model->harga_tiket = $harga;
        $this->model->id_artis = $id_artis;
        $this->model->id_venue = $id_venue;
        return $this->model->create();
    }

    public function getKonserById($id) {
        return $this->model->getById($id);
    }

    public function updateKonser($id, $nama, $tgl, $harga, $id_artis, $id_venue) {
        $this->model->nama_event = $nama;
        $this->model->tanggal = $tgl;
        $this->model->harga_tiket = $harga;
        $this->model->id_artis = $id_artis;
        $this->model->id_venue = $id_venue;
        return $this->model->update($id);
    }

    public function deleteKonser($id) {
        return $this->model->delete($id);
    }
}
?>