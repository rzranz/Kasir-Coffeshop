
<?php

session_start();

require_once "function.php";




if (isset($_GET["pembayaran"])) {

    $menu = ambil_data("SELECT * FROM pembayaran");
    
} else if (isset($_GET["pesanan"])) {

    $menu = ambil_data("SELECT p.kode_pesanan, tk.no_meja, p.kode_menu, p.qty

                        FROM pesanan AS p

                        JOIN pembayaran AS tk ON (tk.kode_pesanan = p.kode_pesanan)

                      ");

} 
else if (isset($_GET["pelanggan"])) {

    $menu = ambil_data("SELECT * from pelanggan");

}  
    else {

    if (!isset($_GET["search"])) {

        $menu = ambil_data("SELECT * FROM menu ORDER BY kode_menu DESC");

    } else {

        $key_search = $_GET["key-search"];

        $menu = ambil_data("SELECT * FROM menu WHERE nama LIKE '%$key_search%' OR

                                                    harga LIKE '%$key_search%' OR

                                                    kategori LIKE '%$key_search%' OR

                                                    `status` LIKE '%$key_search%'

                                                    ORDER BY kode_menu DESC

        ");

    }

}



if (isset($_POST["pesan"])) {

    $pesanan = tambah_data_pesanan();

    echo $pesanan > 0

    ? "<script>

        alert('Pesanan Berhasil Dikirim!');

    </script>"

    : "<script>

        alert('Pesanan Gagal Dikirim!');

    </script>";

}

?>



<!DOCTYPE html>

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./src/css/bootstrap-5.2.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="./src/css/bootstrap-icons-1.8.3/bootstrap-icons.css">

    <title>Beranda</title>

</head>



<body class="bg-light">

    <!-- Header -->

    <div class="container-fluid position-fixed top-0 p-2 d-flex justify-content-between" style="z-index: 2;background: #D2691E;">

        <div class="text-white h3 d-flex">

            <span id="menu-list" role="button"><i class="bi bi-list"></i></span>

            <span class="mx-3">Layung cofee</span>

        </div>

        <a class="btn btn-danger fw-bold" href="logout.php" onclick="return confirm('Ingin Logout?')">Logout</a>

    </div>

    <!-- List Menu -->

    <div id="dropdown-menu" class="container-fluid position-fixed float-start text-white w-auto vh-100" style="display: none; z-index: 1; top: 50px;background: #DEB887;">

        <ul>

            <br>
            <li><a class="text-decoration-none p-2 h5 text-light" href="index.php?menu">MENU</a></li><br>

            <li><a class="text-decoration-none p-2 h5 text-light" href="index.php">MEMESAN</a></li><br>

            <li><a class="text-decoration-none p-2 h5 text-light" href="index.php?pesanan">PESANAN</a></li><br>

            <li><a class="text-decoration-none p-2 h5 text-light" href="index.php?pembayaran">PEMBAYARAN</a></li><br>


        </ul>

    </div>

    <!-- Content -->

    <div class="container" style="z-index: -1; margin-top: 60px;">

    <?php

    if (isset($_GET["pesanan"])) include "halaman/pesanan.php";

    else if (isset($_GET["pembayaran"])) include "halaman/pembayaran.php";
    else if (isset($_GET["menu"])) include "halaman/menu.php";


    else include "halaman/beranda.php";

    ?>

    </div>

    <script src="./src/css/bootstrap-5.2.0/js/bootstrap.min.js"></script>

    <script src="src/js/beranda.js"></script>

</body>



</html>
