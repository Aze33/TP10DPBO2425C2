<?php
require_once 'models/Tiket.php';
require_once 'models/Konser.php';
require_once 'config/Database.php';

class TiketViewModel {
    private $model;
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->model = new Tiket($this->db);
    }

    public function showAllTiket() {
        $stmt = $this->model->read();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getKonserList() {
        $konserModel = new Konser($this->db);
        $stmt = $konserModel->read();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addTiket($nama, $email, $jml, $id_konser) {
        $this->model->nama_pemesan = $nama;
        $this->model->email = $email;
        $this->model->jumlah_tiket = $jml;
        $this->model->id_konser = $id_konser;
        return $this->model->create();
    }

    public function getTiketById($id) {
        return $this->model->getById($id);
    }

    public function updateTiket($id, $nama, $email, $jml, $id_konser) {
        $this->model->nama_pemesan = $nama;
        $this->model->email = $email;
        $this->model->jumlah_tiket = $jml;
        $this->model->id_konser = $id_konser;
        return $this->model->update($id);
    }

    public function deleteTiket($id) {
        return $this->model->delete($id);
    }
}
?>