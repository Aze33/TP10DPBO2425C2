<!DOCTYPE html>
<html>
<head>
    <title>Jadwal Konser</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="nav">
        <a href="index.php?page=artis">Artis</a>
        <a href="index.php?page=venue">Venue</a>
        <a href="index.php?page=konser">Konser</a>
        <a href="index.php?page=tiket">Tiket</a>
    </div>

    <h1>Jadwal Konser</h1>
    
    <div style="text-align:center;">
        <a href="index.php?page=konser&action=add" class="btn btn-add">+ Buat Jadwal Baru</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nama Event</th>
                <th>Artis Utama</th>
                <th>Lokasi</th>
                <th>Tanggal</th>
                <th>Harga Tiket</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($konser_data as $row): ?>
            <tr>
                <td><?= $row['nama_event'] ?></td>
                <td style="font-weight:bold;"><?= $row['nama_artis'] ?></td>
                <td><?= $row['nama_venue'] ?></td>
                <td><?= date('d M Y', strtotime($row['tanggal'])) ?></td>
                <td style=>Rp <?= number_format($row['harga_tiket']) ?></td>
                <td style="text-align:center; white-space: nowrap;">
                    <a href="index.php?page=konser&action=edit&id=<?= $row['id_konser'] ?>" class="btn btn-edit">Edit</a>
                    <a href="index.php?page=konser&action=delete&id=<?= $row['id_konser'] ?>" class="btn btn-delete" onclick="return confirm('Batalkan konser ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>