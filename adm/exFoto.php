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
$query = "SELECT tb_santri.nama, tb_santri.tempat, tb_santri.tanggal, tb_santri.bapak, tb_santri.ibu, tb_santri.hp,
kabupaten.nama AS kb, kecamatan.nama AS kc, kelurahan.nama AS kl, lemari.komplek, dekos.t_kos FROM `tb_santri` 
JOIN kelurahan ON kelurahan.id_kel=tb_santri.desa
JOIN kecamatan ON kecamatan.id_kec=tb_santri.kec
JOIN kabupaten ON kabupaten.id_kab=tb_santri.kab
JOIN lemari ON lemari.nis=tb_santri.nis
JOIN dekos ON dekos.nis=tb_santri.nis
ORDER BY tb_santri.id ASC ";

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
$excel->writeLabel(0, 1, "TEMPAT");
$excel->writeLabel(0, 2, "TANGGAL");
$excel->writeLabel(0, 3, "BAPAK");
$excel->writeLabel(0, 4, "IBU");
$excel->writeLabel(0, 5, "HP");
$excel->writeLabel(0, 6, "KAB");
$excel->writeLabel(0, 7, "KEC");
$excel->writeLabel(0, 8, "KEL");
$excel->writeLabel(0, 9, "KOMPLEK");
$excel->writeLabel(0, 10, "TEMPAT KOS");

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
