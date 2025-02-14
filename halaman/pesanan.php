<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "db_cofeeshop2");

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}


// Query SQL dengan JOIN berdasarkan kode_menu
$query = "SELECT pesanan.kode_pesanan, pesanan.no_meja, menu.nama AS nama_menu, pesanan.qty, pesanan.kode_menu
          FROM pesanan 
          JOIN menu ON pesanan.kode_menu = menu.kode_menu";

$result = mysqli_query($koneksi, $query);

// Simpan hasil dalam array
$pesanan = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($koneksi);
?>

<table class="table table-bordered table-hover" style="margin-top: 100px;">

    <tr class="text" style="background: #D2691E;">
        <th>No</th>
        <th>Kode Pesanan</th>
        <th>No Meja</th>
        <th>Nama Menu</th>
        <th>Qty</th>
    </tr>

    <?php $i = 1; foreach ($pesanan as $p) { ?>
        <tr style="background-color: white;">
            <td><?= $i; ?></td>
            <td><?= htmlspecialchars($p["kode_pesanan"]); ?></td>
            <td><?= htmlspecialchars($p["no_meja"]); ?></td>
            <td><?= htmlspecialchars($p["nama_menu"]); ?></td> <!-- Menampilkan Nama Menu -->
            <td><?= htmlspecialchars($p["qty"]); ?></td>
        </tr>
    <?php $i++; } ?>

</table>
