<?php
class Tiket {
    private $conn;
    private $table_name = "tiket";

    public $id_tiket;
    public $nama_pemesan;
    public $email;
    public $jumlah_tiket;
    public $id_konser;

    public function __construct($db) { $this->conn = $db; }

    public function read() {
        // Join dengan tabel Konser untuk melihat nama event yang dibeli
        $query = "SELECT t.*, k.nama_event 
                  FROM " . $this->table_name . " t
                  JOIN konser k ON t.id_konser = k.id_konser
                  ORDER BY t.id_tiket DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // CREATE: Menyimpan Data Baru
    // Dipakai saat tombol "Simpan" ditekan di form tambah.
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nama_pemesan=:nm, email=:em, jumlah_tiket=:jml, id_konser=:idk";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nm", $this->nama_pemesan);
        $stmt->bindParam(":em", $this->email);
        $stmt->bindParam(":jml", $this->jumlah_tiket);
        $stmt->bindParam(":idk", $this->id_konser);
        return $stmt->execute();
    }

    // GET BY ID: Ambil Satu Data 
    // Dipakai saat tombol "Edit" diklik. Kita butuh data lama biar form-nya terisi otomatis (Data Binding).
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id_tiket = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // UPDATE: Simpan Perubahan
    // Dipakai saat tombol "Simpan Perubahan" diklik.
    public function update($id) {
        $query = "UPDATE " . $this->table_name . " SET nama_pemesan=:nm, email=:em, jumlah_tiket=:jml, id_konser=:idk WHERE id_tiket=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":nm", $this->nama_pemesan);
        $stmt->bindParam(":em", $this->email);
        $stmt->bindParam(":jml", $this->jumlah_tiket);
        $stmt->bindParam(":idk", $this->id_konser);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }

    // DELETE : Menghapus Data
    // Dipakai saat tombol "Hapus" diklik
    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_tiket = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
}
?>