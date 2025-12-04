<?php

$mode_edit = isset($data_edit);

$action_url = $mode_edit ? "index.php?page=artis&action=update" : "index.php?page=artis&action=add";
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $mode_edit ? 'Edit Artis' : 'Tambah Artis' ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-container">
        <h2><?= $mode_edit ? 'Edit Data Artis' : 'Tambah Artis Baru' ?></h2>
        
        <form action="<?= $action_url ?>" method="POST">
            
            <?php if($mode_edit): ?>
                <input type="hidden" name="id_artis" value="<?= $data_edit['id_artis'] ?>">
            <?php endif; ?>

            <div class="form-group">
                <label>Nama Artis</label>
                <input type="text" name="nama" 
                       value="<?= $mode_edit ? $data_edit['nama_artis'] : '' ?>" 
                       placeholder="Misal: Tulus" required>
            </div>
            
            <div class="form-group">
                <label>Genre Musik</label>
                <input type="text" name="genre" 
                       value="<?= $mode_edit ? $data_edit['genre'] : '' ?>" 
                       placeholder="Misal: Jazz Pop" required>
            </div>
            
            <div class="form-group">
                <label>Asal Negara</label>
                <input type="text" name="asal" 
                       value="<?= $mode_edit ? $data_edit['asal_negara'] : '' ?>" 
                       placeholder="Misal: Indonesia" required>
            </div>
            
            <div style="margin-top:20px;">
                <button type="submit" class="btn btn-add" style="width:100%">
                    <?= $mode_edit ? 'Simpan Perubahan' : 'Simpan Data' ?>
                </button>
            </div>
            
            <div style="text-align:center; margin-top:10px;">
                <a href="index.php?page=artis" style="text-decoration:none; color: #007bff; font-size:12px;">Batal & Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>