<?php

require '../koneksi.php';
$nis = $_GET['nis'];

$sq = mysqli_query($conn, "UPDATE lemari_data SET nis = '' WHERE nis = '$nis' ");
$sq2 = mysqli_query($conn, "UPDATE lemari SET komplek = '', kamar = '', no = '', ket = '' WHERE nis = '$nis' ");

if ($sq && $sq2) {
    echo "
    <script>
    window.location.href = 'km_data.php';
    </script>
    ";
}
?>
<!-- PL -->