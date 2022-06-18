<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tempat</th>
                <th>Tanggal</th>
                <th>Komplek</th>
                <th>Alamat</th>
                <th>Bapak</th>
                <th>Ibu</th>
                <th>No. HP</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'koneksi.php';
            $no = 1;
            $sql = mysqli_query($conn, "SELECT a.*, b.komplek  FROM tb_santri a JOIN lemari_data b ON a.nis=b.nis WHERE ket = 'baru'");
            while ($r = mysqli_fetch_assoc($sql)) {
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $r['nama']; ?></td>
                    <td><?= $r['tempat']; ?></td>
                    <td><?= $r['tanggal']; ?></td>
                    <td><?= $r['komplek']; ?></td>
                    <td><?= $r['desa'] . ' - ' . $r['kec'] . ' - ' . $r['kab']; ?></td>
                    <td><?= $r['bapak']; ?></td>
                    <td><?= $r['ibu']; ?></td>
                    <td><?= $r['hp']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>