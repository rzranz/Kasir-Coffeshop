<?php 

session_start();

if (!isset($_SESSION["akun"])){

    header("Location: login.php");

    exit;

} 



session_unset();

session_destroy();



?>

<script>

    alert('Berhasil Logout!');

    location.href = 'login.php';

</script>