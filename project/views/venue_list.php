<!DOCTYPE html>
<html>
<head>
    <title>Data Venue</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="nav">
        <a href="index.php?page=artis">Artis</a>
        <a href="index.php?page=venue">Venue</a>
        <a href="index.php?page=konser">Konser</a>
        <a href="index.php?page=tiket">Tiket</a>
    </div>

    <h1>Lokasi Konser (Venue)</h1>
    
    <div style="text-align:center;">
        <a href="index.php?page=venue&action=add" class="btn btn-add">+ Tambah Venue</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nama Venue</th>
                <th>Kapasitas</th>
                <th>Alamat</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($venue_data as $row): ?>
            <tr>
                <td><?= $row['nama_venue'] ?></td>
                <td><?= number_format($row['kapasitas']) ?> Orang</td>
                <td><?= $row['alamat'] ?></td>
                <td style="text-align:center; white-space: nowrap;">
                    <a href="index.php?page=venue&action=edit&id=<?= $row['id_venue'] ?>" class="btn btn-edit">Edit</a>
                    <a href="index.php?page=venue&action=delete&id=<?= $row['id_venue'] ?>" class="btn btn-delete" onclick="return confirm('Hapus venue ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>