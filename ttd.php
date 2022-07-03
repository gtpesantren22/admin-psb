<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h3>Data buat Absen</h3>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Lembaga</th>
                <th>Ket</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            include 'koneksi.php';
            $dt = mysqli_query($conn, "SELECT * FROM tb_santri ORDER BY lembaga");
            $lm = array('', 'MTs', 'SMP', 'MA', 'SMK');
            while ($r = mysqli_fetch_assoc($dt)) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $r['nama']; ?></td>
                    <td><?= $lm[$r['lembaga']]; ?></td>
                    <td><?= $r['ket']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>