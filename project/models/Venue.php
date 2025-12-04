<?php
class Venue {
    private $conn;
    private $table_name = "venue";

    public $id_venue;
    public $nama_venue;
    public $kapasitas;
    public $alamat;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id_venue DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // CREATE: Menyimpan Data Baru
    // Dipakai saat tombol "Simpan" ditekan di form tambah.
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nama_venue=:nama, kapasitas=:kap, alamat=:almt";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nama", $this->nama_venue);
        $stmt->bindParam(":kap", $this->kapasitas);
        $stmt->bindParam(":almt", $this->alamat);
        return $stmt->execute();
    }

    // UPDATE: Simpan Perubahan
    // Dipakai saat tombol "Simpan Perubahan" diklik.
    public function update($id) {
        $query = "UPDATE " . $this->table_name . " SET nama_venue=:nm, kapasitas=:kp, alamat=:al WHERE id_venue=:id";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(":nm", $this->nama_venue);
        $stmt->bindParam(":kp", $this->kapasitas);
        $stmt->bindParam(":al", $this->alamat);
        $stmt->bindParam(":id", $id);

        return $stmt->execute();
    }

    // GET BY ID: Ambil Satu Data 
    // Dipakai saat tombol "Edit" diklik. Kita butuh data lama biar form-nya terisi otomatis (Data Binding).
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id_venue = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // DELETE : Menghapus Data
    // Dipakai saat tombol "Hapus" diklik
    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_venue = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
}
?>