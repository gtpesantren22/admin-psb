<?php
include '../koneksi.php';

function query($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}

function edit($data)
{
	global $conn;

	$nis = $data['nis'];
	$nik = htmlspecialchars($data["nik"]);
	$no_kk = htmlspecialchars(mysqli_real_escape_string($conn, $data["no_kk"]));
	$nama = strtoupper(htmlspecialchars(mysqli_real_escape_string($conn, $data["nama"])));
	$tempat = htmlspecialchars(mysqli_real_escape_string($conn, $data["tempat"]));
	//$tanggal = htmlspecialchars($data["tanggal"]);
	$jkl = htmlspecialchars($data["jkl"]);
	$tgl = htmlspecialchars($data["tgl"]);
	$bln = htmlspecialchars($data["bln"]);
	$thn = htmlspecialchars($data["thn"]);
	$tanggal = $tgl . "-" . $bln . "-" . $thn;
	$anak_ke = htmlspecialchars(mysqli_real_escape_string($conn, $data["anak_ke"]));
	$jml_sdr = htmlspecialchars(mysqli_real_escape_string($conn, $data["jml_sdr"]));

	$lembaga = htmlspecialchars($data["lembaga"]);
	$jln = htmlspecialchars(mysqli_real_escape_string($conn, $data["jln"]));
	$rt = htmlspecialchars($data["rt"]);
	$rw = htmlspecialchars($data["rw"]);
	$kel = htmlspecialchars($data["kel"]);
	$prop = $_POST['prop'];
	$kota = $_POST['kota'];
	$kec = $_POST['kec'];

	$bapak = strtoupper(htmlspecialchars(mysqli_real_escape_string($conn, $data["bapak"])));
	$ibu = strtoupper(htmlspecialchars(mysqli_real_escape_string($conn, $data["ibu"])));
	$a_pkj = strtoupper(htmlspecialchars(mysqli_real_escape_string($conn, $data["a_pkj"])));
	$i_pkj = strtoupper(htmlspecialchars(mysqli_real_escape_string($conn, $data["i_pkj"])));
	$hp = htmlspecialchars($data["hp"]);

	$asal = strtoupper(htmlspecialchars(mysqli_real_escape_string($conn, $data["asal"])));
	$a_asal = htmlspecialchars(mysqli_real_escape_string($conn, $data["a_asal"]));

	if ($kel == ''  && $kec == '' && $kota == ''  && $prop == '') {
		$query = "UPDATE tb_santri SET nik = '$nik', nama = '$nama', tempat = '$tempat', tanggal = '$tanggal', jkl = '$jkl', lembaga ='$lembaga', 
    jln = '$jln', rt = '$rt', rw = '$rw', bapak = '$bapak', ibu = '$ibu', hp= '$hp',
	anak_ke = '$anak_ke', jml_sdr = '$jml_sdr', a_pkj = '$a_pkj', i_pkj = '$i_pkj', no_kk = '$no_kk', asal = '$asal', a_asal = '$a_asal' 
	WHERE nis = '$nis' ";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	} else {
		$query = "UPDATE tb_santri SET nik = '$nik', nama = '$nama', tempat = '$tempat', tanggal = '$tanggal', jkl = '$jkl', lembaga ='$lembaga', 
    jln = '$jln', rt = '$rt', rw = '$rw', desa = '$kel', kec = '$kec', kab = '$kota', prov = '$prop', bapak = '$bapak', ibu = '$ibu', hp= '$hp',
	anak_ke = '$anak_ke', jml_sdr = '$jml_sdr', a_pkj = '$a_pkj', i_pkj = '$i_pkj', no_kk = '$no_kk', asal = '$asal', a_asal = '$a_asal' 
	WHERE nis = '$nis' ";
		mysqli_query($conn, $query);

		return mysqli_affected_rows($conn);
	}
}

function tgl($tanggal)
{
	$bulan = array(
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);

	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun

	return $pecahkan[0] . ' - ' . $bulan[(int)$pecahkan[1]] . ' - ' . $pecahkan[2];
}

function rupiah($angka)
{

	$hasil_rupiah = "Rp. " . number_format($angka, 0, ',', '.');
	return $hasil_rupiah;
}

?>

<!-- akhir -->