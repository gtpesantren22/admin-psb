<?php

include 'koneksi.php';
$di = $uuid;
$nis = $_GET['nis'];

$san = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_santri WHERE nis = '$nis' "));
$ket = $san['ket'];

if ($ket == 'baru') {
    $by = 50000;
    $link = 'bayar_regist.php?id=' . $di;
} else {
    $by = 25000;
}

$sql = mysqli_query($conn, "INSERT INTO tanggungan (id_tgn, nis, daftar) VALUES ('$di', '$nis', '$by') ");

if ($sql) {
    echo "
    <script>
        window.location = '" . $link . "'
    </script>
    ";
}
