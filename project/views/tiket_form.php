<?php
$mode_edit = isset($data_edit);
$action_url = $mode_edit ? "index.php?page=tiket&action=update" : "index.php?page=tiket&action=add";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Tiket</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-container">
        <h2><?= $mode_edit ? 'Edit Pesanan Tiket' : 'Pesan Tiket' ?></h2>
        <form action="<?= $action_url ?>" method="POST">
            
            <?php if($mode_edit): ?>
                <input type="hidden" name="id_tiket" value="<?= $data_edit['id_tiket'] ?>">
            <?php endif; ?>

            <div class="form-group">
                <label>Nama Pemesan</label>
                <input type="text" name="nama_pemesan" value="<?= $mode_edit ? $data_edit['nama_pemesan'] : '' ?>" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="<?= $mode_edit ? $data_edit['email'] : '' ?>" required>
            </div>
            <div class="form-group">
                <label>Pilih Konser</label>
                <select name="id_konser" required>
                    <option value="">-- Pilih Konser --</option>
                    <?php foreach ($list_konser as $k): ?>
                        <option value="<?= $k['id_konser'] ?>" <?= ($mode_edit && $data_edit['id_konser'] == $k['id_konser']) ? 'selected' : '' ?>>
                            <?= $k['nama_event'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label>Jumlah</label>
                <input type="number" name="jumlah_tiket" value="<?= $mode_edit ? $data_edit['jumlah_tiket'] : '1' ?>" required>
            </div>
            <div style="margin-top:20px;">
                <button type="submit" class="btn btn-add" style="width:100%">Simpan</button>
            </div>
            <div style="text-align:center;">
                <a href="index.php?page=tiket" style="color:white;">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>