<?php

require '../koneksi.php';

$nis = $_GET['nis'];
$kd = uniqid();

$qr = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_santri WHERE nis = '$nis' "));
$ft_lama = $qr['foto'];

$img = $_POST['image'];
$folderPath = "foto_santri/";

$image_parts = explode(";base64,", $img);
$image_type_aux = explode("image/", $image_parts[0]);
$image_type = $image_type_aux[1];

$image_base64 = base64_decode($image_parts[1]);
$fileName = $kd . '.jpg';

if ($ft_lama != '') {
    unlink("foto_santri/" . $ft_lama);
}

$file = $folderPath . $fileName;
file_put_contents($file, $image_base64);

//print_r($fileName);

$q1 = mysqli_query($conn, "UPDATE tb_santri SET foto = '$fileName' WHERE nis = '$nis' ");

if ($q1) {
    echo "<script>
        window.location.href = 'foto.php';
    </script>";
} else {
    echo "<script>
        window.location.href = 'foto.php';
    </script>";
}


?>

<!-- OK -->