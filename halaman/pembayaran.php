<table class="table table-bordered table-hover" style="margin-top: 100px;">
    <tr class="text" style="background: #D2691E;">
        <th>No</th>
        <th>Kode Pesanan</th>
        <th>NO MEJA</th>
        <th>Waktu</th>
        <th>Total Harga</th>
        <th>Pembayaran</th>
        <th>id_karyawan</th>
        <th>Status Pembayaran</th>
        <th>Cetak</th>
    </tr>

    <?php
    $i = 1;
    foreach ($menu as $m) {
        $kode_pesanan = $m["kode_pesanan"];
        $total_pembayaran = ambil_data("SELECT DISTINCT * FROM pesanan
        JOIN pembayaran ON (pesanan.kode_pesanan = pembayaran.kode_pesanan)
        JOIN menu ON (menu.kode_menu = pesanan.kode_menu)
        WHERE pembayaran.kode_pesanan = '$kode_pesanan'");

        // Mengambil status pembayaran dari database
        $status_pembayaran = $m['status_pembayaran'] == 1 ? '✔' : '✖';
    ?>

    <form action="cetak/cetak.php" target="_blank" method="GET" onsubmit="updateStatus('<?= $m['kode_pesanan']; ?>')">
        <input type="hidden" name="kode_pesanan" value="<?= $m['kode_pesanan']; ?>">

        <tr style="background-color: white;">
            <td><?= $i; ?></td>
            <td><?= $m['kode_pesanan']; ?></td>
            <td><?= $m['no_meja']; ?></td>
            <td><?= $m['waktu']; ?></td>
            <td>
                <?php
                $total = 0;
                foreach ($total_pembayaran as $tp) {
                    $total += $tp['qty'] * $tp['harga'];
                }
                echo "Rp." . $total;
                ?>
            </td>
            <td><input name="pembayaran" min="0" type="number"></td>
            <td><?= $m['id_karyawan']; ?></td>
            <td id="status_<?= $m['kode_pesanan']; ?>"> <?= $status_pembayaran; ?> </td>
            <td>
                <button class="btn btn-primary">Cetak</button>
                <a class="btn btn-danger" href="hapus.php?kode_pesanan=<?= $m["kode_pesanan"]; ?>" onclick="return confirm('Hapus Data pembayaran?')">Hapus</a>
            </td>
        </tr>
    </form>

    <?php $i++; } ?>
</table>

<script>
function updateStatus(kodePesanan) {
    // Mengubah status di halaman tanpa reload
    document.getElementById('status_' + kodePesanan).innerHTML = '✔';

    // Mengirim request ke update_status.php
    fetch('update_status.php?kode_pesanan=' + kodePesanan)
        .then(response => response.text())
        .then(data => {
            console.log(data); // Log jika ada informasi lebih lanjut dari server
        })
        .catch(error => {
            console.error("Error updating status:", error);
        });
}
</script>
