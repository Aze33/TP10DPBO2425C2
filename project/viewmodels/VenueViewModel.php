<?php
require_once 'models/Venue.php';
require_once 'config/Database.php';

class VenueViewModel {
    private $model;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->model = new Venue($db);
    }

    public function showAllVenue() {
        $stmt = $this->model->read();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addVenue($nama, $kapasitas, $alamat) {
        $this->model->nama_venue = $nama;
        $this->model->kapasitas = $kapasitas;
        $this->model->alamat = $alamat;
        return $this->model->create();
    }

    public function getVenueById($id) {
        return $this->model->getById($id);
    }

    public function updateVenue($id, $nama, $kapasitas, $alamat) {
        $this->model->nama_venue = $nama;
        $this->model->kapasitas = $kapasitas;
        $this->model->alamat = $alamat;
        return $this->model->update($id);
    }

    public function deleteVenue($id) {
        return $this->model->delete($id);
    }
}
?>