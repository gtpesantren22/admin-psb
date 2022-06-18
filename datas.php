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
                <th>Tetala</th>
                <th>Tetala</th>
                <th>Alamat</th>
                <th>Komplek</th>
                <th>Bapak</th>
                <th>Ibu</th>
                <th>No. HP</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'koneksi.php';
            $no = 1;
            $sql = mysqli_query($conn, "SELECT * FROM tb_santri");
            while ($r = mysqli_fetch_assoc($sql)) {
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $r['nama']; ?></td>
                    <td><?= $r['tempat']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>