# Janji

Saya Zahran Zaidan Saputra dengan NIM 2415429 mengerjakan Tugas Praktikum 10 dalam mata kuliah Desain Pemrograman Berorientasi Objek (DPBO) untuk keberkahan-Nya, maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin

# 🎤 Concert Ticket Management System

**Concert Ticket** adalah aplikasi yang dirancang untuk mendigitalisasi proses pengelolaan acara musik. Proyek ini dibangun menggunakan PHP Native dengan menerapkan pola arsitektur MVVM (Model-View-ViewModel) untuk memisahkan logika bisnis, data, dan antarmuka pengguna secara rapi.

# 🎨 Desain Program

### 1. Struktur Arsitektur MVVM
* **Model:** Mengelola koneksi database dan query SQL (Create, Read, Update, Delete).
    * *File:* `models/Artis.php`, `models/Venue.php`, `models/Konser.php`, `models/Tiket.php`.
* **ViewModel:** Bertindak sebagai perantara (jembatan) antara Model dan View.
    * *File:* `viewmodels/ArtisViewModel.php`, dll.
* **View:** Antarmuka pengguna (UI) yang menampilkan data HTML/CSS.
    * *File:* Folder `views/`.

# 🚀 Fitur Utama
Aplikasi ini memiliki 4 Entitas (Tabel) utama dengan fitur **CRUD (Create, Read, Update, Delete)**:

1.  **Kelola Artis:** Menambah, mengedit, dan menghapus data penyanyi/band.
2.  **Kelola Venue:** Manajemen lokasi konser dan kapasitas penonton.
3.  **Jadwal Konser:** Menghubungkan Artis dan Venue menjadi sebuah Event (Relasi).
4.  **Transaksi Tiket:** Mencatat pemesanan tiket oleh pelanggan untuk konser tertentu.

# 📜 Diagram

<img width="653" height="487" alt="image" src="https://github.com/user-attachments/assets/c8aeec91-5516-4191-8f89-bf50162b40ef" />


# 🏗️ Struktur Folder

```text
project/
│
├── config/
│   └── Database.php          <-- File koneksi ke MySQL
│
├── css/
│   └── style.css             <-- File desain 
│
├── models/                   <-- (M) Mengurus Query Database
│   ├── Artis.php
│   ├── Venue.php
│   ├── Konser.php
│   └── Tiket.php
│
├── viewmodels/               <-- (VM) Penghubung Logika
│   ├── ArtisViewModel.php
│   ├── VenueViewModel.php
│   ├── KonserViewModel.php
│   └── TiketViewModel.php
│
├── views/                    <-- (V) Tampilan HTML & Form
│   ├── artis_list.php
│   ├── artis_form.php
│   ├── venue_list.php
│   ├── venue_form.php
│   ├── konser_list.php
│   ├── konser_form.php
│   ├── tiket_list.php
│   └── tiket_form.php
│
└── index.php                 <-- Pintu masuk utama (Routing)
```

# 🎥 Dokumentasi

