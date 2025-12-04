<?php
// Cek apakah ini mode EDIT atau TAMBAH
$mode_edit = isset($data_edit);
$action_url = $mode_edit ? "index.php?page=venue&action=update" : "index.php?page=venue&action=add";
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= $mode_edit ? 'Edit Venue' : 'Tambah Venue' ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-container">
        <h2><?= $mode_edit ? 'Edit Data Venue' : 'Input Venue Baru' ?></h2>
        <form action="<?= $action_url ?>" method="POST">
            
            <?php if($mode_edit): ?>
                <input type="hidden" name="id_venue" value="<?= $data_edit['id_venue'] ?>">
            <?php endif; ?>

            <div class="form-group">
                <label>Nama Venue</label>
                <input type="text" name="nama_venue" value="<?= $mode_edit ? $data_edit['nama_venue'] : '' ?>" required>
            </div>
            <div class="form-group">
                <label>Kapasitas</label>
                <input type="number" name="kapasitas" value="<?= $mode_edit ? $data_edit['kapasitas'] : '' ?>" required>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" value="<?= $mode_edit ? $data_edit['alamat'] : '' ?>" required>
            </div>
            <div style="margin-top:20px;">
                <button type="submit" class="btn btn-add" style="width:100%"><?= $mode_edit ? 'Update Data' : 'Simpan Data' ?></button>
            </div>
            <div style="text-align:center; margin-top:10px;">
                <a href="index.php?page=venue" style="text-decoration:none; color:white;">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>