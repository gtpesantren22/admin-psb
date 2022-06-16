<?php
session_start();
if (!isset($_SESSION['lvl_bunda_qwertyuiop'])) {
    header("location: ../login.php");
}
$id = $_SESSION['id'];
//panggil header, css, navigasi
include('koneksi.php');
// include('function.php');

$id_usr = $_SESSION['id'];
$user = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id_usr' "));
$nama_user = $user['nama'];

$id = $_GET['id'];
$dd = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM regist WHERE id_regist = '$id' "));
$nis = $dd['nis'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_santri WHERE nis = '$nis' "));
$kd = explode('-', $id);
$kk = $data['no_kk'];
$tang = mysqli_fetch_assoc(mysqli_query($conn, "SELECT *, (infaq + buku + kartu + kalender + seragam_pes + seragam_lem + orsaba) AS jml FROM tanggungan WHERE nis = '$nis' "));
$cek_kk = mysqli_query($conn, "SELECT * FROM tb_santri WHERE no_kk = '$kk' AND ket = 'baru' ");
$cek_byr = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(nominal) AS jml FROM regist WHERE nis = '$nis' GROUP BY nis "));


$bl = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
$date = date('d') . "-" . date('M') . "-" . date('Y');
$jal = array("", "Reguler", "Prestasi");
$lm = array("", "MTs", "SMP", "MA", "SMK");
$tmp = array("", "Kantin", "Gus Zaini", "Ny. Farihah", "Ny. Zahro", "Ny. Sa'adah", "Ny. Mamjudah", "Ny. Naily Z.", "Ny. Lathifah");

$pn = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id' "));
$km = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM lemari_data WHERE nis = '$nis' "));
$kos = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM dekos WHERE nis = '$nis' "));

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
                <img src="../adm/img/lg1.png" alt="logo2" width="120">
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
    <h4 align="center" style="margin-top:0px;">RINCIAN ADMINISTRASI SANTRI BARU</h4>
    <!-- <hr size="0" color="black" style="margin:0px;margin-bottom:1px;"> -->
    <!-- <b>
        <center>
            PANITIA PENERIAMAAN SANTRI BARU (PSB) <br>
            PONPES DARUL LUGHAH WAL KAROMAH<br>
            TAHUN PELAJARAN 2022/2023</center>
    </b> -->

    <p style="font-weight: bold;">A. Identitas Santri</p>
    <table width="35%" border="0" style="float: left;">
        <tr>
            <td width="80">KODE INV.</td>
            <td width="1">:</td>
            <td><?= strtoupper($kd[0]) ?></td>
        </tr>
        <tr>
            <td>TANGGAL </td>
            <td>:</td>
            <td><?= $date; ?></td>
        </tr>
        <tr>
            <td>WAKTU </td>
            <td>:</td>
            <td><?= date('H:i'); ?></td>
        </tr>
    </table>
    <table width="65%" border="0" style="float: left;">
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
    </table>

    <p style="font-weight: bold;">B. Tanggungan Santri</p>
    <table width="100%" border="0">
        <thead>
            <tr>
                <td>No</td>
                <td>Jenis Pembayaran</td>
                <td>Nominal</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Uang Gedung</td>
                <td><?= rupiah($tang['infaq']); ?> <?= mysqli_num_rows($cek_kk) > 1 ? '(50%)' : '' ?></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Buku Pedoman Wiridan, Perizinan & Tatib</td>
                <td><?= rupiah($tang['buku']); ?></th>
            </tr>
            <tr>
                <td>3</td>
                <td>KTS, Kartu Mahrom, Kartu Kesehatan & Foto</td>
                <td><?= rupiah($tang['kartu']); ?></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Kalender Pesantren</th>
                <td><?= rupiah($tang['kalender']); ?></td>
            </tr>
            <tr>
                <td>5</td>
                <td>Seragam Pesantren</td>
                <td><?= rupiah($tang['seragam_pes']); ?></td>
            </tr>
            <tr>
                <td>6</td>
                <td>Seragam Lembaga (Khas dan Olahraga)</td>
                <td><?= rupiah($tang['seragam_lem']); ?> <?= $data['jalur'] == 2 ? '(gratis)' : '' ?></td>
            </tr>
            <tr>
                <td>7</td>
                <td>ORSABA</td>
                <td><?= rupiah($tang['orsaba']); ?></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2">Total Tanggungan</td>
                <td><?= rupiah($tang['jml']); ?></td>
            </tr>
        </tfoot>
    </table>

    <p style="font-weight: bold;">C. Riwayat Pembayaran Santri</p>
    <table width="100%" border="0">
        <thead>
            <tr>
                <td>No</td>
                <td>Tgl Bayar</td>
                <td>Penerima</td>
                <td>Via</td>
                <td>Waktu Input</td>
                <td>Nominal</td>
                <td>#</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $rg = mysqli_query($conn, "SELECT * FROM regist WHERE nis = '$nis' ");
            while ($a = mysqli_fetch_assoc($rg)) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $a['tgl_bayar']; ?></td>
                    <td><?= $a['kasir']; ?></td>
                    <td><?= $a['via']; ?></td>
                    <td><?= $a['created']; ?></td>
                    <td><?= rupiah($a['nominal']); ?></td>
                    <td></td>

                </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5">Total Pembayaran</td>
                <td colspan="2"><?= rupiah($cek_byr['jml']); ?></td>
            </tr>
        </tfoot>
    </table>
    &nbsp;
    <hr>
    <table width="50%" border="0" style="float: left;">
        <thead>
            <tr>
                <td width="150">TOTAL TANGGUNGAN</td>
                <td width="1">:</td>
                <td><?= rupiah($tang['jml']); ?></td>
            </tr>
            <tr>
                <td>LUNAS</td>
                <td>:</td>
                <td><?= rupiah($cek_byr['jml']); ?></td>
            </tr>
            <tr>
                <td>KEKURANGAN </td>
                <td>:</td>
                <td><?= rupiah($tang['jml'] - $cek_byr['jml']); ?></td>
            </tr>
        </thead>
    </table>
    <table width="40%" border="0" style="float: right;">
        <tr>
            <td width="150">Catatan :</td>
        </tr>
        <tr>
            <td width="150">- Pelunasan Registrasi Ulang Akan disesaikan pada : </td>
        </tr>
    </table>
    &nbsp;
    <br>
    <table width="100%" border="0">
        <tr>
            <th>&nbsp;</th>
        </tr>
    </table>
    <table width="100%" border="0">
        <tr>
            <th width="35%">

            </th>
            <th width="30%">
                Kraksaan, <?= date('d-M-Y'); ?><br>
                Mengetahui
            </th>
            <th width="35%">

            </th>
        </tr>
    </table>
    <table width="100%" border="0">
        <tr>
            <th width="35%">
                Wali santri <br><br><br><br>
                <b><u><?= $data['bapak']; ?></u></b>
            </th>
            <th width="30%">
                Bendahara <br><br><br><br>
                <b><u>(______________________________)</u></b </th>
            <th width="35%">
                Penerima <br><br><br><br>
                <b><u><?= $nama_user; ?></u></b>
            </th>
        </tr>
    </table>
    <br>
    <div class="footer">
        <b><i>*Catatan : Dimohon untuk melunasi tanggungan tersebut berdasarkan tanggal yang sudah disepakati</i></b>
    </div>

</body>

</html>