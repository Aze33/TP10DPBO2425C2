<?php
class Konser {
    private $conn;
    private $table_name = "konser";

    public $id_konser;
    public $nama_event;
    public $tanggal;
    public $harga_tiket;
    public $id_artis;
    public $id_venue;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Menggunakan JOIN agar nama artis dan venue muncul 
    // READ : Mengambil Semua Data
    // Dipakai untuk menampilkan daftar di tabel (List Konser).
    public function read() {
        $query = "SELECT k.*, a.nama_artis, v.nama_venue 
                  FROM " . $this->table_name . " k
                  JOIN artis a ON k.id_artis = a.id_artis
                  JOIN venue v ON k.id_venue = v.id_venue
                  ORDER BY k.tanggal ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // CREATE: Menyimpan Data Baru
    // Dipakai saat tombol "Simpan" ditekan di form tambah.
    public function create() {
        $query = "INSERT INTO " . $this->table_name . " 
                  SET nama_event=:nm, tanggal=:tgl, harga_tiket=:hrg, id_artis=:ida, id_venue=:idv";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(":nm", $this->nama_event);
        $stmt->bindParam(":tgl", $this->tanggal);
        $stmt->bindParam(":hrg", $this->harga_tiket);
        $stmt->bindParam(":ida", $this->id_artis);
        $stmt->bindParam(":idv", $this->id_venue);

        return $stmt->execute();
    }

    // GET BY ID: Ambil Satu Data 
    // Dipakai saat tombol "Edit" diklik. Kita butuh data lama biar form-nya terisi otomatis (Data Binding).
    public function getById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id_konser = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // UPDATE: Simpan Perubahan
    // Dipakai saat tombol "Simpan Perubahan" diklik.
    public function update($id) {
        $query = "UPDATE " . $this->table_name . " SET nama_event=:nm, tanggal=:tgl, harga_tiket=:hrg, id_artis=:ida, id_venue=:idv WHERE id_konser=:id";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(":nm", $this->nama_event);
        $stmt->bindParam(":tgl", $this->tanggal);
        $stmt->bindParam(":hrg", $this->harga_tiket);
        $stmt->bindParam(":ida", $this->id_artis);
        $stmt->bindParam(":idv", $this->id_venue);
        $stmt->bindParam(":id", $id);

        return $stmt->execute();
    }

    // DELETE : Menghapus Data
    // Dipakai saat tombol "Hapus" diklik
    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id_konser = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
}
?>