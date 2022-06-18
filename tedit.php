<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table border="1">
        <thead>
            <tr>
                <td>No</td>
                <td>Nama tempat</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'koneksi.php';
            $no = 1;
            $sql = mysqli_query($conn, "SELECT nis, tempat FROM tb_santri ");
            while ($r = mysqli_fetch_assoc($sql)) {
            ?>
                <tr>
                    <form action="" method="post">
                        <td><?= $no++; ?></td>
                        <td>
                            <input type="hidden" name="nis" value="<?= $r['nis']; ?>">
                            <input type="text" name="tempat" value="<?= $r['tempat']; ?>">
                        </td>
                        <td>
                            <button type="submit" name="save">Simpan</button>
                        </td>
                    </form>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>

<?php

if (isset($_POST['save'])) {
    $nis = $_POST['nis'];
    $tempat = $_POST['tempat'];

    $sql = mysqli_query($conn, "UPDATE tb_santri SET tempat = '$tempat' WHERE nis = '$nis' ");
    if ($sql) {
        header("Location: tedit.php");
    }
}
?>