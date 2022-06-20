<?php
session_start();
if (!isset($_SESSION['lvl_adm_qwertyuiop'])) {
    header("location: ../login.php");
}
$id = $_SESSION['id'];
//panggil header, css, navigasi
include('koneksi.php');
include('function.php');

$id_usr = $_SESSION['id'];
$user = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id_usr' "));
$nama_user = $user['nama'];

$id = $_GET['id'];
$dd = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM dekos WHERE id_kos = '$id' "));
$nis = $dd['nis'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_santri WHERE nis = '$nis' "));

$bl = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
$date = date('d') . "-" . date('M') . "-" . date('Y');
$jal = array("", "Reguler", "Prestasi");
$lm = array("", "MTs", "SMP", "MA", "SMK");
$tmp = array("", "Kantin", "Gus Zaini", "Ny. Farihah", "Ny. Zahro", "Ny. Sa'adah", "Ny. Mamjudah", "Ny. Naily Z.", "Ny. Lathifah");

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Cetak Data Santri</title>
    <!-- <link rel="icon" type="image/png" href="assets/images/favicon.png" /> -->
    <style>
        table {
            border-collapse: collapse;
        }

        thead>tr {
            font-weight: bold;
            border: 1px solid;
        }

        tfoot>tr {
            font-weight: bold;
            border: 1px solid;
        }

        thead>tr>th {
            background-color: #0070C0;
            color: #fff;
            padding: 10px;
            border-color: #fff;
        }

        th,
        td {
            padding: 2px;
        }

        th {
            color: #222;
        }

        body {
            font-family: Calibri;
        }

        .footer {
            width: 100%;
            height: 50px;
            padding-left: 10px;
            line-height: 50px;
            color: #000;
            position: absolute;
            bottom: 0px;
        }
    </style>
</head>

<body onload="window.print();">

    <!-- <body> -->
    <table border="0" width="100%">
        <tr>
            <td align="center">
                <img src="img/lg1.png" alt="logo2" width="120">
            </td>
            <td align="">
                <b style="font-size:23px;">PANITIA PENERIAMAAN SANTRI BARU (PSB)</b> <br>
                <b style="font-size:27px;">PONPES DARUL LUGHAH WAL KAROMAH</b> <br>
                Sekretariat : Jl. Mayjend Pandjaitan No. 12, Sidomukti-Kraksaan-Probolinggo Jawa Timur (67282)
            </td>
        </tr>
        <!-- <tr>
            <td colspan="2" align="center" style="font-size:15px;">
                Sekretariat : Jl. Mayjend Pandjaitan No. 12, Sidomukti-Kraksaan-Probolinggo Jawa Timur (67282)
                <br>
                Website : https://ppdwk.com e-mail : ponpesdwk@gmail.com
            </td>
        </tr> -->
        <tr>
            <td colspan="3" align="center">
                <hr size="0" color="black" style="margin:0px;margin-bottom:1px;">
                <!-- <hr size="2" color="black" style="margin:0px;"> -->
            </td>
        </tr>
    </table>
    <br>
    <h4 align="center" style="margin-top:0px;">KWITANSI PEMBAYARAN DEKOSAN</h4>
    <!-- <hr size="0" color="black" style="margin:0px;margin-bottom:1px;"> -->
    <!-- <b>
        <center>
            PANITIA PENERIAMAAN SANTRI BARU (PSB) <br>
            PONPES DARUL LUGHAH WAL KAROMAH<br>
            TAHUN PELAJARAN 2022/2023</center>
    </b> -->

    <table width="100%" border="0" style="float: left;">
        <tr>
            <td width="200">KODE INV.</td>
            <td width="1">:</td>
            <td><?= $id ?></td>
        </tr>
        <tr>
            <td width="80">NIS</td>
            <td width="1">:</td>
            <td><?= $data['nis'] ?></td>
        </tr>
        <tr>
            <td>NAMA</td>
            <td>:</td>
            <td><?= $data['nama']; ?></td>
        </tr>
        <tr>
            <td>ALAMAT </td>
            <td>:</td>
            <td><?= $data['desa'] . '-' . $data['kec'] . '-' . $data['kab']; ?></td>
        </tr>
        <tr>
            <td>Lembaga</td>
            <td>:</td>
            <td><?= $lm[$data['lembaga']]; ?></td>
        </tr>
        <tr>
            <td>NOMINAL </td>
            <td>:</td>
            <td><?= rupiah($dd['nominal']); ?></td>
        </tr>
        <tr>
            <td>TANGGAL PEMBAYARAN </td>
            <td>:</td>
            <td><?= $dd['tgl']; ?></td>
        </tr>
        <tr>
            <td>UNTUK PEMBAYARAN </td>
            <td>:</td>
            <td>Dekosan (Uang Makan)</td>
        </tr>
        <tr>
            <td>TEMPAT DEKOS </td>
            <td>:</td>
            <td><?= $tmp[$dd['t_kos']]; ?></td>
        </tr>
    </table>


    <table width="100%" border="0">
        <tr>
            <th width="35%">

            </th>
            <th width="30%">
            </th>
            <th width="35%">
                Kraksaan, <?= date('d-M-Y'); ?><br>
            </th>
        </tr>
    </table>
    <table width="100%" border="0">
        <tr>
            <th width="35%">

            </th>
            <th width="30%">

            <th width="35%">
                Penerima <br><br><br><br>
                <b><u><?= $nama_user; ?></u></b>
            </th>
        </tr>
    </table>
    <br>
    <div style="border-bottom:3px dashed #CC0000;">potong disini</div>
    <br>
    <table border="0" width="100%">
        <tr>
            <td align="center">
                <img src="img/lg1.png" alt="logo2" width="120">
            </td>
            <td align="">
                <b style="font-size:23px;">PANITIA PENERIAMAAN SANTRI BARU (PSB)</b> <br>
                <b style="font-size:27px;">PONPES DARUL LUGHAH WAL KAROMAH</b> <br>
                Sekretariat : Jl. Mayjend Pandjaitan No. 12, Sidomukti-Kraksaan-Probolinggo Jawa Timur (67282)
            </td>
        </tr>
        <!-- <tr>
            <td colspan="2" align="center" style="font-size:15px;">
                Sekretariat : Jl. Mayjend Pandjaitan No. 12, Sidomukti-Kraksaan-Probolinggo Jawa Timur (67282)
                <br>
                Website : https://ppdwk.com e-mail : ponpesdwk@gmail.com
            </td>
        </tr> -->
        <tr>
            <td colspan="3" align="center">
                <hr size="0" color="black" style="margin:0px;margin-bottom:1px;">
                <!-- <hr size="2" color="black" style="margin:0px;"> -->
            </td>
        </tr>
    </table>
    <br>
    <h4 align="center" style="margin-top:0px;">KWITANSI PEMBAYARAN DEKOSAN</h4>
    <!-- <hr size="0" color="black" style="margin:0px;margin-bottom:1px;"> -->
    <!-- <b>
        <center>
            PANITIA PENERIAMAAN SANTRI BARU (PSB) <br>
            PONPES DARUL LUGHAH WAL KAROMAH<br>
            TAHUN PELAJARAN 2022/2023</center>
    </b> -->

    <table width="100%" border="0" style="float: left;">
        <tr>
            <td width="200">KODE INV.</td>
            <td width="1">:</td>
            <td><?= $id ?></td>
        </tr>
        <tr>
            <td width="80">NIS</td>
            <td width="1">:</td>
            <td><?= $data['nis'] ?></td>
        </tr>
        <tr>
            <td>NAMA</td>
            <td>:</td>
            <td><?= $data['nama']; ?></td>
        </tr>
        <tr>
            <td>ALAMAT </td>
            <td>:</td>
            <td><?= $data['desa'] . '-' . $data['kec'] . '-' . $data['kab']; ?></td>
        </tr>
        <tr>
            <td>Lembaga</td>
            <td>:</td>
            <td><?= $lm[$data['lembaga']]; ?></td>
        </tr>
        <tr>
            <td>NOMINAL </td>
            <td>:</td>
            <td><?= rupiah($dd['nominal']); ?></td>
        </tr>
        <tr>
            <td>TANGGAL PEMBAYARAN </td>
            <td>:</td>
            <td><?= $dd['tgl']; ?></td>
        </tr>
        <tr>
            <td>UNTUK PEMBAYARAN </td>
            <td>:</td>
            <td>Dekosan (Uang Makan)</td>
        </tr>
        <tr>
            <td>TEMPAT DEKOS </td>
            <td>:</td>
            <td><?= $tmp[$dd['t_kos']]; ?></td>
        </tr>
    </table>


    <table width="100%" border="0">
        <tr>
            <th width="35%">

            </th>
            <th width="30%">
            </th>
            <th width="35%">
                Kraksaan, <?= date('d-M-Y'); ?><br>
            </th>
        </tr>
    </table>
    <table width="100%" border="0">
        <tr>
            <th width="35%">

            </th>
            <th width="30%">

            <th width="35%">
                Penerima <br><br><br><br>
                <b><u><?= $nama_user; ?></u></b>
            </th>
        </tr>
    </table>

</body>

</html>