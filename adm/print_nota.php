<?php
session_start();
//include('sesi.php');
require 'function.php';
$id = $_GET["id"];
$rw = query("SELECT a.*, b.* FROM pembayaran a JOIN tb_santri b ON a.nis=b.nis WHERE a.id = $id")[0];

$sn = $rw['nis'];
$pb = query("SELECT SUM(u_pesantren) AS up, SUM(u_lembaga) AS ul  FROM pembayaran WHERE nis = $sn")[0];

$id_l = $rw['id'];
$leng = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM atribut WHERE id = $id_l"));

$nama = $_SESSION['nama'];

$lem = $rw['lembaga'];
if ($lem == 1) {
    $l = 'MTs';
} elseif ($lem == 2) {
    $l = 'SMP';
} elseif ($lem == 3) {
    $l = 'MA';
} elseif ($lem == 4) {
    $l = 'SMK';
}

$gel = $rw['gel'];
if ($gel == 1) {
    $g = 'Gel. 1';
} elseif ($gel == 2) {
    $g = 'Gel. 2';
} else {
    $g = 'Gel. 3';
}

function penyebut($nilai)
{
    $nilai = abs($nilai);
    $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " " . $huruf[$nilai];
    } else if ($nilai < 20) {
        $temp = penyebut($nilai - 10) . " belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai / 10) . " puluh" . penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai / 100) . " ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai / 1000) . " ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai / 1000000) . " juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai / 1000000000) . " milyar" . penyebut(fmod($nilai, 1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai / 1000000000000) . " trilyun" . penyebut(fmod($nilai, 1000000000000));
    }
    return $temp;
}

function terbilang($nilai)
{
    if ($nilai < 0) {
        $hasil = "minus " . trim(penyebut($nilai)) . " rupiah";
    } else {
        $hasil = trim(penyebut($nilai)) . " rupiah";
    }
    return $hasil;
}

$jk = $rw['jkl'];
if ($jk == "Laki-laki") {
    $jkl = 1;
} else {
    $jkl = 2;
}

$lembaga = $rw['lembaga'];
$gel = $rw['gel'];
$jal = $rw['jalur'];

$kode = $rw['lembaga'] . $rw['jalur'] . $rw['gel'];
$ql = mysqli_query($conn, "SELECT * FROM harga WHERE kode = $kode");
$kd = mysqli_fetch_assoc($ql);
$kd_ok = $kd['rp'];

if ($jkl == "1") {
    $jumlah = 855000 + $kd_ok;
    //echo rupiah($lk);
} else {
    $jumlah = 900000 + $kd_ok;
    //echo rupiah($pr);
}

if ($jkl == 1) {
    $jjj = "Putra";
} else {
    $jjj = "Putri";
}

// $angka = 1020000;
// echo terbilang($angka);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Nota</title>
</head>
<style type="text/css">
    input[type=checkbox]+label {
        display: block;
        margin: 0.1em;
        cursor: pointer;
        padding: 0.1em;
    }

    input[type=checkbox] {
        display: none;
    }

    input[type=checkbox]+label:before {
        content: "\2714";
        border: 0.1em solid #000;
        border-radius: 0.1em;
        display: inline-block;
        width: 0.9em;
        height: 0.9em;
        padding-left: 0.1em;
        padding-bottom: 0.1em;
        margin-right: 0.3em;
        vertical-align: bottom;
        color: transparent;
        transition: .2s;
    }

    input[type=checkbox]+label:active:before {
        transform: scale(0);
    }

    input[type=checkbox]:checked+label:before {
        background-color: #000;
        border-color: #000;
        color: #000;
        padding-bottom: 0.3em;
        font-size: 14px;
    }

    .footer {
        width: 100%;
        height: 50px;
        padding-left: 10px;
        line-height: 50px;
        background: #fff;
        color: #000;
        position: absolute;
        bottom: 0px;
        font-weight: bold;
        font-style: italic;
    }
</style>

<body>
    <table width="100%" border="0">
        <tbody>
            <tr>
                <td colspan="7" style="font-size: 15px; text-align: center;">Bendahara - PSB DWK 2021</td>
            </tr>
            <tr>
                <td colspan="7" style="font-size: 15px; text-align: center;">PP DARUL LUGHAH WAL
                    KAROMAH
                </td>
            </tr>
            <tr>
                <td colspan="7" style="font-size: 15px; text-align: center;">Alamat : Jl. Mayjend Pandjaitan No.12 Telp.
                    (0335) 841740 Kraksaan - Probolinggo</td>
            </tr>
            <tr>
                <td style="border: 1px solid;" colspan="8"></td>
            </tr>
            <tr height="10px">
                <td colspan="7"></td>
            </tr>
            <tr>
                <td colspan="7" style="font-size: 20px; font-weight: bold;">No Kwitansi : <?= $rw['id']; ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td width="150">Telah diterima dari</td>
                <td colspan="5"> : <?= $rw['nama']; ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Jumlah uang</td>
                <td colspan="5"> : <?= rupiah($rw['u_pesantren'] + $rw['u_lembaga']); ?> (<?= terbilang($rw['u_pesantren'] + $rw['u_lembaga']); ?>)</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Untuk pembayaran</td>
                <td colspan="5"> : Pendaftaran PSB 2021</td>
            </tr>
            <tr height="10px">
                <td colspan="7"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>1. Untuk Pesantren</td>
                <td colspan="5">: <?= rupiah($rw['u_pesantren']); ?> (<?= terbilang($rw['u_pesantren']); ?>)</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>2. Untuk Lembaga</td>
                <td colspan="5">: <?= rupiah($rw['u_lembaga']); ?> - ( <?= $l; ?> | <?= $g; ?> )</td>
            </tr>
            <tr height="10px">
                <td>&nbsp;</td>
                <td colspan="3">
                    <hr style="border: 0.5px solid #000;">
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td style="font-size: 17px; font-weight: bold;">TOTAL </td>
                <td style="font-size: 17px; font-weight: bold;">: <?= rupiah($rw['u_pesantren'] + $rw['u_lembaga']); ?></td>
                <td colspan="4">&nbsp;</td>
            </tr>
            <tr height="10px">
                <td colspan="7"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td style="font-size: 15px; font-weight: bold;" colspan="3">JUMLAH PEMBAYARAN</td>
                <td colspan="3" style="font-size: 15px; font-weight: bold;">: <?= rupiah($pb['up'] + $pb['ul']); ?> - ( <?= $l; ?> |
                    <?= $g; ?> |
                    <?= $jjj; ?>)</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3" style="font-size: 15px; font-weight: bold; color: red;">JUMLAH KEKURANGAN </td>
                <td colspan="3" style="font-size: 15px; font-weight: bold; color: red;">: <?= rupiah($jumlah - ($pb['up'] + $pb['ul'])); ?>
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr height="10px">
                <td colspan="7"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td style="text-decoration: underline; font-weight: bold;" colspan="2">
                    <label for="">URAIAN PENDAFTARAN</label>
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">
                    <?php if ($leng['seragam'] == 1) {
                        echo '<input type="checkbox" checked>';
                    } else {
                        echo '<input type="checkbox">';
                    } ?>
                    <label for="demo-checkbox-1">Seragam Pesantren</label>
                </td>
                <td colspan="2">
                    <?php if ($leng['tatib'] == 1) {
                        echo '<input type="checkbox" checked>';
                    } else {
                        echo '<input type="checkbox">';
                    } ?>
                    <label for="demo-checkbox-1">Buku Tatib dan Perizinan</label>
                </td>
                <td colspan="2">
                    <?php if ($leng['kes'] == 1) {
                        echo '<input type="checkbox" checked>';
                    } else {
                        echo '<input type="checkbox">';
                    } ?>
                    <label for="demo-checkbox-1">Kartu Kesehatan</label>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">
                    <?php if ($leng['seragam_l'] == 1) {
                        echo '<input type="checkbox" checked>';
                    } else {
                        echo '<input type="checkbox">';
                    } ?>
                    <label for="demo-checkbox-1">Seragam Lembaga</label>
                </td>
                <td colspan="2">
                    <?php if ($leng['pengasuh'] == 1) {
                        echo '<input type="checkbox" checked>';
                    } else {
                        echo '<input type="checkbox">';
                    } ?>
                    <label for="demo-checkbox-1">Foto Pengasuh </label>
                </td>
                <td colspan="2">
                    <?php if ($leng['kalender'] == 1) {
                        echo '<input type="checkbox" checked>';
                    } else {
                        echo '<input type="checkbox">';
                    } ?>
                    <label for="demo-checkbox-1">Kalender</label>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">
                    <?php if ($leng['wir'] == 1) {
                        echo '<input type="checkbox" checked>';
                    } else {
                        echo '<input type="checkbox">';
                    } ?>
                    <label for="demo-checkbox-1">Buku Pedoman Wiridan</label>
                </td>
                <td colspan="2">
                    <?php if ($leng['tatib'] == 1) {
                        echo '<input type="checkbox" checked>';
                    } else {
                        echo '<input type="checkbox">';
                    } ?>
                    <label for="demo-checkbox-1">Buku Tatib dan Perizinan</label>
                </td>
                <td colspan="2">
                    <?php if ($leng['kts'] == 1) {
                        echo '<input type="checkbox" checked>';
                    } else {
                        echo '<input type="checkbox">';
                    } ?>
                    <label for="demo-checkbox-1">KTS dan Foto</label>
                </td>
            </tr>
            <tr height="10px">
                <td colspan="7"></td>
            </tr>
            <!-- batas -->
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="4"></td>
                <td style="text-align: left;">Kraksaan, <?= date("d M Y"); ?></td>
            </tr>
            <tr>
                <td colspan="6">&nbsp;</td>
                <td style="text-align: left;" width="200">Penerima</td>
            </tr>
            <tr>
                <td colspan="7">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="7">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="6">&nbsp;</td>
                <td style="text-align: left;" width="200"><b><u><?= $nama; ?></u></b></td>
            </tr>
        </tbody>
    </table>
    <br>
    <hr>
    <table width="100%" border="0">
        <tbody>
            <tr>
                <td colspan="7" style="font-size: 15px; text-align: center;">Bendahara - PSB DWK 2021</td>
            </tr>
            <tr>
                <td colspan="7" style="font-size: 15px; text-align: center;">PP DARUL LUGHAH WAL
                    KAROMAH
                </td>
            </tr>
            <tr>
                <td colspan="7" style="font-size: 15px; text-align: center;">Alamat : Jl. Mayjend Pandjaitan No.12 Telp.
                    (0335) 841740 Kraksaan - Probolinggo</td>
            </tr>
            <tr>
                <td style="border: 1px solid;" colspan="8"></td>
            </tr>
            <tr height="10px">
                <td colspan="7"></td>
            </tr>
            <tr>
                <td colspan="7" style="font-size: 20px; font-weight: bold;">No Kwitansi : <?= $rw['id']; ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td width="150">Telah diterima dari</td>
                <td colspan="5"> : <?= $rw['nama']; ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Jumlah uang</td>
                <td colspan="5"> : <?= rupiah($rw['u_pesantren'] + $rw['u_lembaga']); ?> (<?= terbilang($rw['u_pesantren'] + $rw['u_lembaga']); ?>)</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>Untuk pembayaran</td>
                <td colspan="5"> : Pendaftaran PSB 2021</td>
            </tr>
            <tr height="10px">
                <td colspan="7"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>1. Untuk Pesantren</td>
                <td colspan="5">: <?= rupiah($rw['u_pesantren']); ?> (<?= terbilang($rw['u_pesantren']); ?>)</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>2. Untuk Lembaga</td>
                <td colspan="5">: <?= rupiah($rw['u_lembaga']); ?> - ( <?= $l; ?> | <?= $g; ?> )</td>
            </tr>
            <tr height="10px">
                <td>&nbsp;</td>
                <td colspan="3">
                    <hr style="border: 0.5px solid #000;">
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td style="font-size: 17px; font-weight: bold;">TOTAL </td>
                <td style="font-size: 17px; font-weight: bold;">: <?= rupiah($rw['u_pesantren'] + $rw['u_lembaga']); ?></td>
                <td colspan="4">&nbsp;</td>
            </tr>
            <tr height="10px">
                <td colspan="7"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td style="font-size: 15px; font-weight: bold;" colspan="3">JUMLAH PEMBAYARAN</td>
                <td colspan="3" style="font-size: 15px; font-weight: bold;">: <?= rupiah($pb['up'] + $pb['ul']); ?> - ( <?= $l; ?> |
                    <?= $g; ?> |
                    <?= $jjj; ?>)</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="3" style="font-size: 15px; font-weight: bold; color: red;">JUMLAH KEKURANGAN </td>
                <td colspan="3" style="font-size: 15px; font-weight: bold; color: red;">: <?= rupiah($jumlah - ($pb['up'] + $pb['ul'])); ?>
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr height="10px">
                <td colspan="7"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td style="text-decoration: underline; font-weight: bold;" colspan="2">
                    <label for="">URAIAN PENDAFTARAN</label>
                </td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">
                    <?php if ($leng['seragam'] == 1) {
                        echo '<input type="checkbox" checked>';
                    } else {
                        echo '<input type="checkbox">';
                    } ?>
                    <label for="demo-checkbox-1">Seragam Pesantren</label>
                </td>
                <td colspan="2">
                    <?php if ($leng['tatib'] == 1) {
                        echo '<input type="checkbox" checked>';
                    } else {
                        echo '<input type="checkbox">';
                    } ?>
                    <label for="demo-checkbox-1">Buku Tatib dan Perizinan</label>
                </td>
                <td colspan="2">
                    <?php if ($leng['kes'] == 1) {
                        echo '<input type="checkbox" checked>';
                    } else {
                        echo '<input type="checkbox">';
                    } ?>
                    <label for="demo-checkbox-1">Kartu Kesehatan</label>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">
                    <?php if ($leng['seragam_l'] == 1) {
                        echo '<input type="checkbox" checked>';
                    } else {
                        echo '<input type="checkbox">';
                    } ?>
                    <label for="demo-checkbox-1">Seragam Lembaga</label>
                </td>
                <td colspan="2">
                    <?php if ($leng['pengasuh'] == 1) {
                        echo '<input type="checkbox" checked>';
                    } else {
                        echo '<input type="checkbox">';
                    } ?>
                    <label for="demo-checkbox-1">Foto Pengasuh </label>
                </td>
                <td colspan="2">
                    <?php if ($leng['kalender'] == 1) {
                        echo '<input type="checkbox" checked>';
                    } else {
                        echo '<input type="checkbox">';
                    } ?>
                    <label for="demo-checkbox-1">Kalender</label>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td colspan="2">
                    <?php if ($leng['wir'] == 1) {
                        echo '<input type="checkbox" checked>';
                    } else {
                        echo '<input type="checkbox">';
                    } ?>
                    <label for="demo-checkbox-1">Buku Pedoman Wiridan</label>
                </td>
                <td colspan="2">
                    <?php if ($leng['tatib'] == 1) {
                        echo '<input type="checkbox" checked>';
                    } else {
                        echo '<input type="checkbox">';
                    } ?>
                    <label for="demo-checkbox-1">Buku Tatib dan Perizinan</label>
                </td>
                <td colspan="2">
                    <?php if ($leng['kts'] == 1) {
                        echo '<input type="checkbox" checked>';
                    } else {
                        echo '<input type="checkbox">';
                    } ?>
                    <label for="demo-checkbox-1">KTS dan Foto</label>
                </td>
            </tr>
            <tr height="10px">
                <td colspan="7"></td>
            </tr>
            <!-- batas -->
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td colspan="4"></td>
                <td style="text-align: left;">Kraksaan, <?= date("d M Y"); ?></td>
            </tr>
            <tr>
                <td colspan="6">&nbsp;</td>
                <td style="text-align: left;" width="200">Penerima</td>
            </tr>
            <tr>
                <td colspan="7">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="7">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="6">&nbsp;</td>
                <td style="text-align: left;" width="200"><b><u><?= $nama; ?></u></b></td>
            </tr>
        </tbody>
    </table>
    <!-- <div class="footer">
        NB : Pelunasan maksimal sebelum Bulan Maulid
    </div> -->
</body>

</html>
<script>
    window.print();
</script>