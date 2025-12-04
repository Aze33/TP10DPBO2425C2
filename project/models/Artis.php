<?php
class Artis {
    private $conn;
    private $table_name = "artis";

    public $id_artis;
    public $nama_artis;
    public $genre;
    public $asal_negara;

    public function __construct($db) {
        $this->conn = $db;
    }

    // READ
    public function read() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id_artis DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // CREATE: Menyimpan Data Baru
    // Dipakai saat tombol "Simpan" ditekan di form tambah.
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nama_artis=:nama, genre=:genre, asal_negara=:asal";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(":nama", $this->nama_artis);
        $stmt->bindParam(":genre", $this->genre);
        $stmt->bindParam(":asal", $this->asal_negara);

        return $stmt->execute();
    }

    // GET BY ID: Ambil Satu Data 
    // Dipakai saat tombol "Edit" diklik. Kita butuh data lama biar form-nya terisi otomatis (Data Binding).
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id_artis = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // UPDATE: Simpan Perubahan
    // Dipakai saat tombol "Simpan Perubahan" diklik.
    public function update($id) {
        $query = "UPDATE " . $this->table_name . " SET nama_artis=:nm, genre=:gn, asal_negara=:an WHERE id_artis=:id";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(":nm", $this->nama_artis);
        $stmt->bindParam(":gn", $this->genre);
        $stmt->bindParam(":an", $this->asal_negara);
        $stmt->bindParam(":id", $id);

        return $stmt->execute();
    }

    // DELETE : Menghapus Data
    // Dipakai saat tombol "Hapus" diklik
    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_artis = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
}
?>