<!DOCTYPE html>
<html>
<head>
    <title>Penjualan Tiket</title>
    <link rel="stylesheet" href="css/style.css?v=4">
</head>
<body>
    <div class="nav">
        <a href="index.php?page=artis">Artis</a>
        <a href="index.php?page=venue">Venue</a>
        <a href="index.php?page=konser">Konser</a>
        <a href="index.php?page=tiket">Tiket</a>
    </div>

    <h1>Data Penjualan Tiket</h1>
    
    <div style="text-align:center; margin: 20px 0;">
        <a href="index.php?page=tiket&action=add" class="btn btn-add">
            + Pesan Tiket Baru
        </a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Nama Pemesan</th>
                <th>Email</th>
                <th>Event Konser</th>
                <th>Jumlah</th>
                <th width="200">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tiket_data as $row): ?>
            <tr>
                <td><?= $row['nama_pemesan'] ?></td>
                <td><?= $row['email'] ?></td>
                
                <td><?= $row['nama_event'] ?></td>
                
                <td style="text-align:center; font-weight:bold;"><?= $row['jumlah_tiket'] ?></td>
                
                <td style="text-align:center; white-space: nowrap;">
                    <a href="index.php?page=tiket&action=edit&id=<?= $row['id_tiket'] ?>" class="btn btn-edit">Edit</a>
                    <a href="index.php?page=tiket&action=delete&id=<?= $row['id_tiket'] ?>" class="btn btn-delete" onclick="return confirm('Batalkan pesanan ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>