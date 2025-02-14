<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "db_cofeeshop2");

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query untuk mengambil data menu
$query = "SELECT * FROM menu";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Coffee Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    
    <div class="container mt-5">
        <h2 class="mb-4">Daftar Menu</h2>
        <a href="tambah.php" class="btn btn-success mb-3">+ Tambah Menu</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Menu</th>
                    <th>Gambar</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $i = 1;
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= htmlspecialchars($row["nama"]); ?></td>
                        <td><img src="src/img/<?= htmlspecialchars($row["gambar"]); ?>" width="100"></td>
                        <td>Rp<?= number_format($row["harga"], 0, ',', '.'); ?></td>
                        <td><?= htmlspecialchars($row["kategori"]); ?></td>
                        <td><?= htmlspecialchars($row["status"]); ?></td>
                        <td>
                            <a href="edit.php?id_menu=<?= $row["id_menu"]; ?>" class="btn btn-warning">Ubah</a>
                            <a href="hapus.php?id_menu=<?= $row["id_menu"]; ?>" class="btn btn-danger" onclick="return confirm('Ingin menghapus menu ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
// Menutup koneksi database
mysqli_close($koneksi);
?>
