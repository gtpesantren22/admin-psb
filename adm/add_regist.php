<?php

include 'function.php';

$id = $uuid;
$nis = $_GET['nis'];

$sn = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_santri WHERE nis =  '$nis' "));
if ($sn['gel'] == 1) {
    $df = 50000;
} elseif ($sn['gel'] == 2) {
    $df = 100000;
} elseif ($sn['gel'] == 3) {
    $df = 150000;
}

$sql = mysqli_query($conn, "INSERT INTO tanggungan(id_tgn,nis,daftar) VALUES ('$id', '$nis', '$df') ");
if ($sql) {
    echo "
    <script>
        window.location = 'bayar_regist.php?id=" . $id . "'
    </script>
    ";
}
