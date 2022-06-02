<?php
require_once "Excel.class.php";

#koneksi ke mysql
//$mysqli = new mysqli("localhost", "root", "", "psb21");
$mysqli = new mysqli("localhost", "u9048253_dwk", "PesantrenDWKIT2021", "u9048253_psb21");
if ($mysqli->connect_error) {
	die('Connect Error (' . $mysqli->connect_error . ') ');
}
#akhir koneksi

#ambil data
$query = "SELECT a.nama, a.lembaga, b.kk, b.akt, b.ijz, b.pres, b.sfk FROM tb_santri a JOIN berkas b ON a.nis=b.nis 
ORDER BY a.jkl ASC ";

$sql = $mysqli->query($query);
$arrmhs = array();
while ($row = $sql->fetch_assoc()) {
	array_push($arrmhs, $row);
}
#akhir data

$excel = new Excel();
#Send Header
$now = date("d/m/Y H:i");
$excel->setHeader('Data Santri Pulang - '.$now.'.xls');
$excel->BOF();

#header tabel
$excel->writeLabel(0, 0, "NAMA");
$excel->writeLabel(0, 1, "LEMBAGA");
$excel->writeLabel(0, 2, "KK");
$excel->writeLabel(0, 3, "AKTE");
$excel->writeLabel(0, 4, "IJAZAH");
$excel->writeLabel(0, 5, "SUKET PRESTASI");
$excel->writeLabel(0, 6, "SERTIFIKAT PRESTASI");

#isi data
$i = 1;
foreach ($arrmhs as $baris) {
	$j = 0;
	foreach ($baris as $value) {
		$excel->writeLabel($i, $j, $value);
		$j++;
	}
	$i++;
}

$excel->EOF();

exit();
