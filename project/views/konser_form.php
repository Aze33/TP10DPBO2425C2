<?php
$mode_edit = isset($data_edit);
$action_url = $mode_edit ? "index.php?page=konser&action=update" : "index.php?page=konser&action=add";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Konser</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-container">
        <h2><?= $mode_edit ? 'Edit Jadwal Konser' : 'Buat Jadwal Baru' ?></h2>
        <form action="<?= $action_url ?>" method="POST">
            
            <?php if($mode_edit): ?>
                <input type="hidden" name="id_konser" value="<?= $data_edit['id_konser'] ?>">
            <?php endif; ?>

            <div class="form-group">
                <label>Nama Event</label>
                <input type="text" name="nama_event" value="<?= $mode_edit ? $data_edit['nama_event'] : '' ?>" required>
            </div>
            
            <div class="form-group">
                <label>Pilih Artis</label>
                <select name="id_artis" required>
                    <option value="">-- Pilih Artis --</option>
                    <?php foreach ($list_artis as $a): ?>
                        <option value="<?= $a['id_artis'] ?>" <?= ($mode_edit && $data_edit['id_artis'] == $a['id_artis']) ? 'selected' : '' ?>>
                            <?= $a['nama_artis'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Pilih Venue</label>
                <select name="id_venue" required>
                    <option value="">-- Pilih Venue --</option>
                    <?php foreach ($list_venue as $v): ?>
                        <option value="<?= $v['id_venue'] ?>" <?= ($mode_edit && $data_edit['id_venue'] == $v['id_venue']) ? 'selected' : '' ?>>
                            <?= $v['nama_venue'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tanggal" value="<?= $mode_edit ? $data_edit['tanggal'] : '' ?>" required>
            </div>

            <div class="form-group">
                <label>Harga Tiket</label>
                <input type="number" name="harga_tiket" value="<?= $mode_edit ? $data_edit['harga_tiket'] : '' ?>" required>
            </div>

            <div style="margin-top:20px;">
                <button type="submit" class="btn btn-add" style="width:100%">Simpan</button>
            </div>
            <div style="text-align:center;">
                <a href="index.php?page=konser" style="color:white;">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>