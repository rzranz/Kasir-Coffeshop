<?php
include("function.php"); // Pastikan koneksi database sudah ada dalam file function.php

if (isset($_GET['kode_pesanan'])) {
    $kode_pesanan = $_GET['kode_pesanan'];

    // Update status pembayaran menjadi 1
    $query = "UPDATE pembayaran SET status_pembayaran = 1 WHERE kode_pesanan = '$kode_pesanan'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "Status Pembayaran Berhasil Diperbarui!";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
