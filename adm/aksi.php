<?php

include '../koneksi.php';

if ($_GET['fn'] == 'berkas') {
    $nis = $_POST['nis'];
    $kk = $_POST['kk'];
    $k_kk = $_POST['k_kk'];
    $akt = $_POST['akt'];
    $k_akt = $_POST['k_akt'];
    $ijz = $_POST['ijz'];
    $k_ijz = $_POST['k_ijz'];
    $sfk = $_POST['sfk'];
    $k_sfk = $_POST['k_sfk'];
    $pres = $_POST['pres'];
    $k_pres = $_POST['k_pres'];

    if (empty($kk)) {
        $kk = 0;
    }
    if (empty($akt)) {
        $akt = 0;
    }
    if (empty($ijz)) {
        $ijz = 0;
    }
    if (empty($sfk)) {
        $sfk = 0;
    }
    if (empty($pres)) {
        $pres = 0;
    }

    mysqli_query($conn, "UPDATE berkas SET sfk = $sfk, k_sfk = '$k_sfk', pres = $pres, k_pres = '$k_pres', 
kk = $kk, k_kk = $k_kk, akt = $akt, k_akt = $k_akt, ijz = $ijz, k_ijz = $k_ijz WHERE nis = '$nis' ");

    header("Location: berkas.php");
} elseif ($_GET['fn'] == 'edit_s') {
    $nis = $_POST['nis'];
    $nik = htmlspecialchars($_POST["nik"]);
    $no_kk = htmlspecialchars(mysqli_real_escape_string($conn, $_POST["no_kk"]));
    $nama = strtoupper(htmlspecialchars(mysqli_real_escape_string($conn, $_POST["nama"])));
    $tempat = htmlspecialchars(mysqli_real_escape_string($conn, $_POST["tempat"]));
    //$tanggal = htmlspecialchars($_POST["tanggal"]);
    $jkl = htmlspecialchars($_POST["jkl"]);
    $tgl = htmlspecialchars($_POST["tgl"]);
    $bln = htmlspecialchars($_POST["bln"]);
    $thn = htmlspecialchars($_POST["thn"]);
    $tanggal = $tgl . "-" . $bln . "-" . $thn;
    $anak_ke = htmlspecialchars(mysqli_real_escape_string($conn, $_POST["anak_ke"]));
    $jml_sdr = htmlspecialchars(mysqli_real_escape_string($conn, $_POST["jml_sdr"]));

    $lembaga = htmlspecialchars($_POST["lembaga"]);
    $jln = htmlspecialchars(mysqli_real_escape_string($conn, $_POST["jln"]));
    $rt = htmlspecialchars($_POST["rt"]);
    $rw = htmlspecialchars($_POST["rw"]);

    $prop = $_POST['prop'];
    $kota = $_POST['kota'];
    $kec = $_POST['kec'];
    $kel = $_POST['kel'];

    $proN = mysqli_fetch_assoc(mysqli_query($conn, "SELECT nama FROM provinsi WHERE id_prov = '$prop'"));
    $kabN = mysqli_fetch_assoc(mysqli_query($conn, "SELECT nama FROM kabupaten WHERE id_kab = '$kota'"));
    $kecN = mysqli_fetch_assoc(mysqli_query($conn, "SELECT nama FROM kecamatan WHERE id_kec = '$kec'"));
    $kelN = mysqli_fetch_assoc(mysqli_query($conn, "SELECT nama FROM kelurahan WHERE id_kel = '$kel'"));

    $proOk = $proN['nama'];
    $kabOk = $kabN['nama'];
    $kecOk = $kecN['nama'];
    $kelOk = $kelN['nama'];

    $bapak = strtoupper(htmlspecialchars(mysqli_real_escape_string($conn, $_POST["bapak"])));
    $ibu = strtoupper(htmlspecialchars(mysqli_real_escape_string($conn, $_POST["ibu"])));
    $a_pkj = htmlspecialchars(mysqli_real_escape_string($conn, $_POST["a_pkj"]));
    $i_pkj = htmlspecialchars(mysqli_real_escape_string($conn, $_POST["i_pkj"]));
    $hp = htmlspecialchars($_POST["hp"]);

    $asal = strtoupper(htmlspecialchars(mysqli_real_escape_string($conn, $_POST["asal"])));
    $a_asal = htmlspecialchars(mysqli_real_escape_string($conn, $_POST["a_asal"]));

    if ($kel == ''  && $kec == '' && $kota == ''  && $prop == '') {
        $query = "UPDATE tb_santri SET nik = '$nik', nama = '$nama', tempat = '$tempat', tanggal = '$tanggal', jkl = '$jkl', lembaga ='$lembaga', 
    jln = '$jln', rt = '$rt', rw = '$rw', bapak = '$bapak', ibu = '$ibu', hp= '$hp',
	anak_ke = '$anak_ke', jml_sdr = '$jml_sdr', a_pkj = '$a_pkj', i_pkj = '$i_pkj', no_kk = '$no_kk', asal = '$asal', a_asal = '$a_asal' 
	WHERE nis = '$nis' ";
        mysqli_query($conn, $query);

        header("Location: santri.php");
    } else {
        $query = "UPDATE tb_santri SET nik = '$nik', nama = '$nama', tempat = '$tempat', tanggal = '$tanggal', jkl = '$jkl', lembaga ='$lembaga', 
    jln = '$jln', rt = '$rt', rw = '$rw', desa = '$kelOk', kec = '$kecOk', kab = '$kabOk', prov = '$proOk', bapak = '$bapak', ibu = '$ibu', hp= '$hp',
	anak_ke = '$anak_ke', jml_sdr = '$jml_sdr', a_pkj = '$a_pkj', i_pkj = '$i_pkj', no_kk = '$no_kk', asal = '$asal', a_asal = '$a_asal' 
	WHERE nis = '$nis' ";
        mysqli_query($conn, $query);

        header("Location: santri.php");
    }
} elseif ($_GET['fn'] == 'foto') {
    $nis = $_POST['nis'];
    $no = $_POST['no'] . $_POST['tipe'];

    mysqli_query($conn, "UPDATE tb_santri SET foto = '$no' WHERE nis = '$nis' ");
    header("Location: foto.php");
}

?>

<!-- OK -->