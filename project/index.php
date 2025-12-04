<?php
require_once 'viewmodels/ArtisViewModel.php';
require_once 'viewmodels/VenueViewModel.php';
require_once 'viewmodels/KonserViewModel.php';
require_once 'viewmodels/TiketViewModel.php';

// URL
$page = isset($_GET['page']) ? $_GET['page'] : 'artis';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

// =================== ARTIS ===================
if ($page == 'artis') {
    $vm = new ArtisViewModel();

    // 1. Jika tombol "Simpan" ditekan (Menyimpan Data)
    if ($action == 'add' && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $vm->addArtis($_POST['nama'], $_POST['genre'], $_POST['asal']);
        header("Location: index.php?page=artis");
    
    // 2. Jika tombol "Update" ditekan (Menyimpan Perubahan)
    } elseif ($action == 'update' && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $vm->updateArtis($_POST['id_artis'], $_POST['nama'], $_POST['genre'], $_POST['asal']);
        header("Location: index.php?page=artis");

    // 3. Jika tombol Edit ditekan (Membuka Form Edit)
    } elseif ($action == 'edit') {
        $data_edit = $vm->getArtisById($_GET['id']);
        include 'views/artis_form.php'; 

    // 4. Jika tombol Tambah ditekan (Membuka Form Tambah)
    } elseif ($action == 'add') {
        include 'views/artis_form.php'; 

    // 5. Jika tombol Hapus ditekan
    } elseif ($action == 'delete') {
        $vm->deleteArtis($_GET['id']);
        header("Location: index.php?page=artis");

    // 6. Default: Tampilkan Daftar
    } else {
        $artis_data = $vm->showAllArtis();
        include 'views/artis_list.php';
    }
}

// =================== VENUE ===================
elseif ($page == 'venue') {
    $vm = new VenueViewModel();
    if ($action == 'add' && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $vm->addVenue($_POST['nama_venue'], $_POST['kapasitas'], $_POST['alamat']);
        header("Location: index.php?page=venue");
    } elseif ($action == 'update' && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $vm->updateVenue($_POST['id_venue'], $_POST['nama_venue'], $_POST['kapasitas'], $_POST['alamat']);
        header("Location: index.php?page=venue");
    } elseif ($action == 'edit') {
        $data_edit = $vm->getVenueById($_GET['id']); // Ambil data lama
        include 'views/venue_form.php'; 
    } elseif ($action == 'add') {
        include 'views/venue_form.php'; 
    } elseif ($action == 'delete') {
        $vm->deleteVenue($_GET['id']);
        header("Location: index.php?page=venue");
    } else {
        $venue_data = $vm->showAllVenue();
        include 'views/venue_list.php';
    }
}

// =================== KONSER ===================
elseif ($page == 'konser') {
    $vm = new KonserViewModel();
    if ($action == 'add' && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $vm->addKonser($_POST['nama_event'], $_POST['tanggal'], $_POST['harga_tiket'], $_POST['id_artis'], $_POST['id_venue']);
        header("Location: index.php?page=konser");
    } elseif ($action == 'update' && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $vm->updateKonser($_POST['id_konser'], $_POST['nama_event'], $_POST['tanggal'], $_POST['harga_tiket'], $_POST['id_artis'], $_POST['id_venue']);
        header("Location: index.php?page=konser");
    } elseif ($action == 'edit') {
        $data_edit = $vm->getKonserById($_GET['id']);
        $list_artis = $vm->getArtisList(); 
        $list_venue = $vm->getVenueList(); 
        include 'views/konser_form.php';
    } elseif ($action == 'add') {
        $list_artis = $vm->getArtisList();
        $list_venue = $vm->getVenueList();
        include 'views/konser_form.php'; 
    } elseif ($action == 'delete') {
        $vm->deleteKonser($_GET['id']);
        header("Location: index.php?page=konser");
    } else {
        $konser_data = $vm->showAllKonser();
        include 'views/konser_list.php';
    }
}

// =================== TIKET ===================
elseif ($page == 'tiket') {
    $vm = new TiketViewModel();
    if ($action == 'add' && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $vm->addTiket($_POST['nama_pemesan'], $_POST['email'], $_POST['jumlah_tiket'], $_POST['id_konser']);
        header("Location: index.php?page=tiket");
    } elseif ($action == 'update' && $_SERVER['REQUEST_METHOD'] == 'POST') {
        $vm->updateTiket($_POST['id_tiket'], $_POST['nama_pemesan'], $_POST['email'], $_POST['jumlah_tiket'], $_POST['id_konser']);
        header("Location: index.php?page=tiket");
    } elseif ($action == 'edit') {
        $data_edit = $vm->getTiketById($_GET['id']);
        $list_konser = $vm->getKonserList();
        include 'views/tiket_form.php';
    } elseif ($action == 'add') {
        $list_konser = $vm->getKonserList();
        include 'views/tiket_form.php'; 
    } elseif ($action == 'delete') {
        $vm->deleteTiket($_GET['id']);
        header("Location: index.php?page=tiket");
    } else {
        $tiket_data = $vm->showAllTiket();
        include 'views/tiket_list.php';
    }
}
?>