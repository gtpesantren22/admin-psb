<?php

require 'function.php';

$kode = $_GET['kode'];
$nis = $_GET['nis'];

if ($kode === 'brks') {
    $sql = mysqli_query($conn, "INSERT INTO berkas(nis) VALUES ('$nis') ");

    if ($sql) {
        echo "
    <script>
        window.location = 'lengkap.php?nis=" . $nis . "';
    </script>
    ";
    }
} else if ($kode === 'atr') {
    $sql = mysqli_query($conn, "INSERT INTO atribut(nis) VALUES ('$nis') ");

    if ($sql) {
        echo "
    <script>
        window.location = 'lengkap_atr.php?nis=" . $nis . "';
    </script>
    ";
    }
}
