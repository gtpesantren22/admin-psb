<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>App kirim manual</h3>
    <a href="kerem.php">kirim massal</a>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Stts</th>
                <th>Ket</th>
                <th>Tgl Daftar</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'koneksi.php';
            $no = 1;
            $sql = mysqli_query($conn, "SELECT * FROM tb_santri ORDER BY waktu_daftar ASC");
            while ($r = mysqli_fetch_assoc($sql)) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $r['nama']; ?></td>
                    <td><?= $r['desa'] . ' - ' . $r['kec'] . ' - ' . $r['kab']; ?></td>
                    <td><?= $r['stts']; ?></td>
                    <td><?= $r['ket']; ?></td>
                    <td><?= $r['waktu_daftar']; ?></td>
                    <td>
                        <a href="<?= 'japri.php?kode=jpr&id=' . $r['id_santri'] ?>"><button>Japri</button></a>
                        <a href="<?= 'japri.php?kode=grp&id=' . $r['id_santri'] ?>"><button>Group</button></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>