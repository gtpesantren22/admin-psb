<?php
include 'koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table style="font-size: 13px; border: 1px solid #000" border="1">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Lembaga</th>
                <th>Tanggungan</th>
                <th>Lunas</th>
                <th>Sisa</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $sql = mysqli_query($conn, "SELECT a.*, b.* FROM tanggungan a JOIN tb_santri b ON a.nis=b.nis WHERE b.ket = 'lama' ORDER BY a.orsaba ASC ");
            $lm = array("", "MTs", "SMP", "MA", "SMK");
            while ($row = mysqli_fetch_assoc($sql)) {
                $nis = $row['nis'];
                $tang = mysqli_fetch_assoc(mysqli_query($conn, "SELECT *, (infaq + buku + kartu + kalender + seragam_pes + seragam_lem + orsaba) AS jml FROM tanggungan WHERE nis = '$nis' "));
                $cek_byr = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(nominal) AS jml FROM regist WHERE nis = '$nis' GROUP BY nis "));
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $lm[$row['lembaga']]; ?></td>
                <td><?= rupiah($tang['jml']); ?></td>
                <td><?= rupiah($cek_byr['jml']); ?></td>
                <td><?= rupiah($tang['jml'] - $cek_byr['jml']); ?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="nis" value="<?= $row['nis']; ?>">
                        <input type="hidden" name="id" value="<?= $row['id_tgn']; ?>">
                        <button type="submit" name="add">buat</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>

<?php

if (isset($_POST['add'])) {

    $nis = $_POST['nis'];
    $id = $_POST['id'];
    $data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_santri WHERE nis = '$nis' "));
    $jkl = $data['jkl'];
    $ket = $data['ket'];
    $lembaga = $data['lembaga'];
    $kk = $data['no_kk'];
    $byr = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM biaya WHERE jkl = '$jkl' AND ket = '$ket' "));

    // $infaq = preg_replace("/[^0-9]/", "", $_POST['infaq']);
    $buku = preg_replace("/[^0-9]/", "", $byr['buku']);
    $kartu = preg_replace("/[^0-9]/", "", $byr['kartu']);
    $kalender = preg_replace("/[^0-9]/", "", $byr['kalender']);
    $seragam_pes = preg_replace("/[^0-9]/", "", $byr['seragam_pes']);
    $seragam_lem = preg_replace("/[^0-9]/", "", $byr['seragam_lem']);
    $orsaba = preg_replace("/[^0-9]/", "", $byr['orsaba']);

    if (mysqli_num_rows($cek_kk) > 1) {
        $infaqOk = 0;
    } else {
        $infaqOk = 0;
    }

    if ($data['jalur'] == 2) {
        $seragam_lemOK = 0;
    } elseif ($data['lembaga'] == 4 && $data['ket'] == 'lama') {
        $seragam_lemOK = 0;
    } else {
        $seragam_lemOK = $seragam_lem;
    }


    $sql = mysqli_query($conn, "UPDATE tanggungan SET infaq = '$infaqOk', buku = '$buku', kartu = '$kartu', kalender = '$kalender', seragam_pes = '$seragam_pes', seragam_lem = '$seragam_lemOK', orsaba = '$orsaba' WHERE id_tgn = '$id' ");
    if ($sql) {
        mysqli_query($conn, "UPDATE tb_santri SET stts = 'Terverifikasi' WHERE nis = '$nis' ");
        echo "
                    <script>
                            document.location.href = 'geLama.php'
                        </script>
                    ";
    }
}

?>