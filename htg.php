<?php

include 'koneksi.php';
$pa = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS jml FROM tb_santri WHERE jkl = 'Laki-laki' AND lembaga = 4 "));
$pi = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS jml FROM tb_santri WHERE jkl = 'Perempuan' AND lembaga = 4 "));
$pa2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS jml FROM tb_santri WHERE jkl = 'Laki-laki' AND lembaga = 3 "));
$pi2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS jml FROM tb_santri WHERE jkl = 'Perempuan' AND lembaga = 3 "));

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
	Data sementara SMK
	<h2>Data Putra : <?= $pa['jml']; ?></h2>
	<h2>Data Putri : <?= $pi['jml']; ?></h2>

	<hr>

	Data sementara MA
	<h2>Data Putra : <?= $pa2['jml']; ?></h2>
	<h2>Data Putri : <?= $pi2['jml']; ?></h2>
</body>

</html>