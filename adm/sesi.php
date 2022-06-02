<?php
// include "../koneksi.php";
session_start();
include '../koneksi.php';

if (!isset($_SESSION['lvl_bunda_qwertyuiop'])) {
    echo "
    <script>
    alert('Anda tidak bisa mengakses halaman ini. Silahkan login kembali')
        document.location.href = '../index.php';
    </script>
    ";
}

$id = $_SESSION['id'];
$user = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM user WHERE id_user = $id "));
