<?php
session_start();
if (!isset($_SESSION['lvl_adm_qwertyuiop'])) {
    header("location: ../login.php");
}
$id = $_SESSION['id'];
//panggil header, css, navigasi
include('koneksi.php');
include('function.php');

$nis = $_GET['nis'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_santri WHERE nis = '$nis' "));


$bl = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
$date = date('d') . "-" . date('F') . "-" . date('Y');
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
            background-color: #0070C0;
            color: #f1f1f1;
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
        }
    </style>
</head>

<body onload="window.print();">
    <table border="0" width="100%">
        <tr>
            <td align="center">
                <img src="img/lg1.png" alt="logo2" width="120">
            </td>
            <td align="center">
                <b style="font-size:23px;">PANITIA PENERIAMAAN SANTRI BARU (PSB)</b> <br>
                <b style="font-size:27px;">PONPES DARUL LUGHAH WAL KAROMAH</b> <br>
                <b style="font-size:20px;">TAHUN AJARAN 2022/2023</b>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center" style="font-size:15px;">
                Sekretariat : Jl. Mayjend Pandjaitan No. 12, Sidomukti-Kraksaan-Probolinggo Jawa Timur (67282)
                <br>
                Website : https://ppdwk.com e-mail : ponpesdwk@gmail.com
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center">
                <hr size="0" color="black" style="margin:0px;margin-bottom:1px;">
                <hr size="2" color="black" style="margin:0px;">
            </td>
        </tr>
    </table>

    <h4 align="center" style="margin-top:0px;"><u>FORMULIR PENDAFTARAN</u></h4>
    <b>
        <center>
            PANITIA PENERIAMAAN SANTRI BARU (PSB) <br>
            PONPES DARUL LUGHAH WAL KAROMAH<br>
            TAHUN PELAJARAN 2022/2023</center>
    </b>
    <br>

    <table width="100%" border="0">
        <tr>
            <td width="200">NO. PENDAFTARAN</td>
            <td width="1">:</td>
            <td><?= $data['nis'] ?></td>
        </tr>
        <tr>
            <td>TANGGAL PENDAFTARAN </td>
            <td>:</td>
            <td><?= $data['waktu_daftar']; ?></td>
        </tr>
        <tr>
            <td>GELOMBANG PENDAFTARAN </td>
            <td>:</td>
            <td>Gel. <?= $data['gel']; ?></td>
        </tr>
        <tr>
            <td>JALUR PENDAFTARAN </td>
            <td>:</td>
            <td><?= $jal[$data['jalur']]; ?></td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td><?= $data['nik']; ?></td>
        </tr>
        <tr>
            <td>NO KK</td>
            <td>:</td>
            <td><?= $data['no_kk']; ?></td>
        </tr>
        <tr>
            <td>NAMA LENGKAP</td>
            <td>:</td>
            <td><?= $data['nama']; ?></td>
        </tr>
        <tr>
            <td>TEMPAT, TANGGAL LAHIR</td>
            <td>:</td>
            <td><?= $data['tempat'] . ', ' . $data['tanggal']; ?></td>
        </tr>
        <tr>
            <td>JENIS KELAMIN</td>
            <td>:</td>
            <td><?= $data['jkl']; ?></td>
        </tr>
        <tr>
            <td>ANAK KE</td>
            <td>:</td>
            <td><?= $data['anak_ke']; ?> dari : <?= $data['jml_sdr']; ?> bersaudara</td>
        </tr>
        <tr>
            <td>TUJUAN</td>
            <td>:</td>
            <td><?= $lm[$data['lembaga']]; ?> Darul Lughah Wal Karomah</td>
        </tr>
        <tr>
            <td>ALAMAT</td>
            <td>:</td>
            <td><?= $data['jln'] . ' RT/RW ' . $data['rt'] . '/' . $data['rw'] . ' ' . $data['desa'] . '-' . $data['kec'] . '-' . $data['kab']; ?></td>
        </tr>
        <tr>
            <td>NAMA ORANG TUA</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td style="padding-left:25px;">AYAH</td>
            <td>:</td>
            <td><?= $data['bapak']; ?></td>
        </tr>
        <tr>
            <td style="padding-left:25px;">IBU</td>
            <td>:</td>
            <td><?= $data['ibu']; ?></td>
        </tr>
        <tr>
            <td style="padding-left:25px;">PEKERJAAN AYAH</td>
            <td>:</td>
            <td><?= $data['a_pkj']; ?></td>
        </tr>
        <tr>
            <td style="padding-left:25px;">PEKERJAAN IBU</td>
            <td>:</td>
            <td><?= $data['i_pkj']; ?></td>
        </tr>
        <tr>
            <td>NO. HANDPHONE (HP)</td>
            <td>:</td>
            <td><?= $data['hp']; ?></td>
        </tr>
        <tr>
            <td>KAMAR</td>
            <td>:</td>
            <td><?= $km['komplek'] . " / " . $km['kamar'] . " / " . $km['loker']; ?> (<?= $km['wali']; ?>)</td>
        </tr>
        <tr>
            <td>TEMPAT KOS</td>
            <td>:</td>
            <td><?php if (isset($kos['t_kos'])) {
                    echo $tmp[$kos['t_kos']];
                } else {
                    echo " - ";
                }
                ?></td>
        </tr>
    </table>
    <p>Dengan ini kami mennyatakan bahwa semua keterangan yang kami berikan diatas adalah benar.</p>
    <br>

    <table width="100%" border="1">
        <tr>
            <th width="35%">
                Calon Santri <br><br><br><br><br>
                <b><u><?= $data['nama']; ?></u></b>
            </th>
            <th width="35%">
                Orang Tua/wali <br><br><br><br><br>
                <b><u><?= $data['bapak']; ?></u></b>
            </th>
            <th width="30%">
                Penerima <br><br><br><br><br>
                <b><u><?= $pn['nama']; ?></u></b>
            </th>
        </tr>
    </table>
    <br>
    <div class="footer">
        <b>Catatan* Bukti Pendaftaran ini dibawa saat akan melakukan pendaftaran ulang</b>
    </div>

</body>

</html>