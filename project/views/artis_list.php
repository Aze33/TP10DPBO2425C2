<!DOCTYPE html>
<html>
<head>
    <title>Data Artis</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="nav">
        <a href="index.php?page=artis">Artis</a>
        <a href="index.php?page=venue">Venue</a>
        <a href="index.php?page=konser">Konser</a>
        <a href="index.php?page=tiket">Tiket</a>
    </div>

    <h1>Data Artis</h1>
    
    <div style="text-align:center; margin: 20px 0;">
        <a href="index.php?page=artis&action=add" class="btn btn-add">
            + Tambah Artis
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nama Artis</th>
                <th>Genre</th>
                <th>Asal Negara</th>
                <th width="200">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($artis_data as $row): ?>
            <tr>
                <td><?= $row['nama_artis'] ?></td>
                <td><?= $row['genre'] ?></td>
                <td><?= $row['asal_negara'] ?></td>
                <td style="text-align:center;">
                    <a href="index.php?page=artis&action=edit&id=<?= $row['id_artis'] ?>" class="btn btn-edit">Edit</a>
                    
                    <a href="index.php?page=artis&action=delete&id=<?= $row['id_artis'] ?>" class="btn btn-delete" onclick="return confirm('Hapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>