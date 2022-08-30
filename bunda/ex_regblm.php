<?php
require_once 'koneksi.php';

$dt = mysqli_query($conn, "SELECT a.*, b.nama, b.desa, b.kec, b.kab, b.lembaga, b.nik, b.jkl, SUM(nominal) AS bayar FROM regist a JOIN tb_santri b ON a.nis=b.nis WHERE b.ket = 'lama' GROUP BY a.nis ORDER BY `b`.`nama` ASC ");

$lm = array('', 'MTs', 'SMP', 'MA', 'SMK');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Pembayaran Registrasi Santri Baru PSB 2022.xls");
?>

<body>
    <h3 class="text-center">Data Reggistrasi Santri Baru PSB 2022</h3>
    <h4 class="text-center">PonPes Darul Lughah Wal Karomah</h4>

    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Lembaga</th>
                <th>Nominal Yang dibayar</th>
                <th>Kekurangan</th>
                <th>Harus Dibayar</th>
                <th>Gender</th>
                <th>Saudara</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($dt as $ar) :
                $nis = $ar['nis'];
                $nik = $ar['nik'];
                $tang = mysqli_fetch_assoc(mysqli_query($conn, "SELECT (infaq + buku + kartu + kalender + seragam_pes + seragam_lem + orsaba) AS jml FROM tanggungan WHERE nis = '$nis' "));
                $dpl = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_santri WHERE nik = '$nik' "));
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $ar['nama']; ?></td>
                    <td><?= $ar['desa'] . '-' . $ar['kec'] . '-' . $ar['kab']; ?></td>
                    <td><?= $lm[$ar['lembaga']]; ?></td>
                    <td><?= $ar['bayar']; ?></td>
                    <td><?= $tang['jml'] - $ar['bayar']; ?></td>
                    <td><?= $tang['jml']; ?></td>
                    <td><?= $ar['jkl']; ?></td>
                    <td><?= $dpl > 1 ? 'Ya' : '-' ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>