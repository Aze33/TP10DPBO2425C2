CREATE DATABASE concert_db;
USE concert_db;

-- Tabel 1: Artis (Master)
CREATE TABLE artis (
    id_artis INT AUTO_INCREMENT PRIMARY KEY,
    nama_artis VARCHAR(100) NOT NULL,
    genre VARCHAR(50) NOT NULL,
    asal_negara VARCHAR(50)
);

-- Tabel 2: Venue (Master)
CREATE TABLE venue (
    id_venue INT AUTO_INCREMENT PRIMARY KEY,
    nama_venue VARCHAR(100) NOT NULL,
    kapasitas INT NOT NULL,
    alamat TEXT
);

-- Tabel 3: Konser (Relasi ke Artis & Venue)
CREATE TABLE konser (
    id_konser INT AUTO_INCREMENT PRIMARY KEY,
    nama_event VARCHAR(100) NOT NULL,
    tanggal DATE NOT NULL,
    harga_tiket DECIMAL(10,2) NOT NULL,
    id_artis INT,
    id_venue INT,
    FOREIGN KEY (id_artis) REFERENCES artis(id_artis) ON DELETE CASCADE,
    FOREIGN KEY (id_venue) REFERENCES venue(id_venue) ON DELETE CASCADE
);

-- Tabel 4: Tiket (Transaksi)
CREATE TABLE tiket (
    id_tiket INT AUTO_INCREMENT PRIMARY KEY,
    nama_pemesan VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    jumlah_tiket INT NOT NULL,
    id_konser INT,
    FOREIGN KEY (id_konser) REFERENCES konser(id_konser) ON DELETE CASCADE
);

-- 1. Isi Data ARTIS
INSERT INTO artis (nama_artis, genre, asal_negara) VALUES 
('Sheila on 7', 'Pop Rock', 'Indonesia'),
('Coldplay', 'Alternative Rock', 'Inggris'),
('Tulus', 'Pop Jazz', 'Indonesia');

-- 2. Isi Data VENUE
INSERT INTO venue (nama_venue, kapasitas, alamat) VALUES 
('Stadion Utama Gelora Bung Karno', 77000, 'Jl. Pintu Satu Senayan, Jakarta'),
('Garuda Wisnu Kencana (GWK)', 20000, 'Jl. Raya Uluwatu, Bali'),
('Istora Senayan', 7000, 'Jl. Pintu Satu Senayan, Jakarta');

-- 3. Isi Data KONSER
INSERT INTO konser (nama_event, tanggal, harga_tiket, id_artis, id_venue) VALUES 
('Tunggu Aku Di Jakarta', '2025-06-15', 350000.00, 1, 1), 
('Music of the Spheres World Tour', '2025-11-20', 1500000.00, 2, 1),
('Tur Manusia', '2025-08-10', 250000.00, 3, 3);

-- 4. Isi Data TIKET
INSERT INTO tiket (nama_pemesan, email, jumlah_tiket, id_konser) VALUES 
('Budi Santoso', 'budi.santoso@email.com', 2, 1),
('Siti Aminah', 'siti.aminah@email.com', 1, 2),
('Andi Pratama', 'andi.pratama@email.com', 4, 1);