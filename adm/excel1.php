<?php
require "Excel.class.php";

#koneksi ke mysql
include '../koneksi.php';

if ($conn->connect_error) {
	die('Connect Error (' . $conn->connect_error . ') ');
}
#akhir koneksi

#ambil data
$query = "SELECT a.nis, nik, nama, tempat, tanggal, jkl, anak_ke, jml_sdr, jln, rt, rw, 
desa, kec, kab, 
CASE lembaga
WHEN 1 THEN 'MTs'
WHEN 2 THEN 'SMP'
WHEN 3 THEN 'MA'
WHEN 4 THEN 'SMK'
END AS
lm, bapak, ibu, a_pkj, i_pkj, hp, asal, a_asal, 
stts, gel, jalur, waktu_daftar, no_kk, b.komplek, b.kamar, foto
FROM tb_santri a JOIN lemari_data b ON a.nis=b.nis WHERE ket = 'baru'
ORDER BY waktu_daftar ASC";

$sql = $conn->query($query);
$arrmhs = array();
while ($row = $sql->fetch_assoc()) {
	array_push($arrmhs, $row);
}
#akhir data

$excel = new Excel();
#Send Header
$excel->setHeader('Data Satri Baru 2022.xls');
#$excel->EX();
$excel->BOF();

#header tabel

$excel->writeLabel(0, 0, "NIS");
$excel->writeLabel(0, 1, "NIK");
$excel->writeLabel(0, 2, "NAMA");
$excel->writeLabel(0, 3, "TMP LAHIR");
$excel->writeLabel(0, 4, "TGL LAHIR");
$excel->writeLabel(0, 5, "JKL");
$excel->writeLabel(0, 6, "ANAK KE");
$excel->writeLabel(0, 7, "JML SDR");
$excel->writeLabel(0, 8, "JLN");
$excel->writeLabel(0, 9, "RT");
$excel->writeLabel(0, 10, "RW");
$excel->writeLabel(0, 11, "DESA");
$excel->writeLabel(0, 12, "KEC");
$excel->writeLabel(0, 13, "KAB");
$excel->writeLabel(0, 14, "LEMBAGA");
$excel->writeLabel(0, 15, "NAMA AYAH");
$excel->writeLabel(0, 16, "NAMA IBU");
$excel->writeLabel(0, 17, "PKJ AYAH");
$excel->writeLabel(0, 18, "PKJ IBU");
$excel->writeLabel(0, 19, "NO HP");
$excel->writeLabel(0, 20, "ASAL SKLH");
$excel->writeLabel(0, 21, "ALAMAT SKLH ASAL");
$excel->writeLabel(0, 22, "STATUS");
$excel->writeLabel(0, 23, "GELOMBANG");
$excel->writeLabel(0, 24, "JALUR");
$excel->writeLabel(0, 25, "TANGGAL DAFTAR");
$excel->writeLabel(0, 26, "NO KK");
$excel->writeLabel(0, 27, "KOMPLEK");
$excel->writeLabel(0, 28, "KAMAR");
$excel->writeLabel(0, 29, "NO FOTO");

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
