<?php
include 'koneksi.php';
$id = $_GET['id'];
$kode = $_GET['kode'];

$dt = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_santri WHERE id_santri = '$id' "));
$nama = $dt['nama'];
$alm = $dt['desa'] . ' - ' . $dt['kec'] . ' - ' . $dt['kab'];
$gel = $dt['gel'];
$lembaga = $dt['lembaga'];
$jalur = $dt['jalur'];
$hp = $dt['hp'];
// $hp = '085236924510';


if ($gel == 1) {
    $by = 'Rp. 50.000';
} else if ($gel == 2) {
    $by = 'Rp. 100.000';
} else if ($gel == 3) {
    $by = 'Rp. 150.000';
}

if ($lembaga == 1) {
    $bg = 'MTs DWK';
} else if ($lembaga == 2) {
    $bg = 'SMP DWK';
} else if ($lembaga == 3) {
    $bg = 'MA DWK';
} else if ($lembaga == 4) {
    $bg = 'SMK DWK';
}

if ($jalur == 1) {
    $lj = 'Reguler';
} else {
    $lj = 'Prestasi';
}

$pesan = '*Selamat*

Data yang anda isi telah  tersimpan di data panitia Penerimaan santri baru PP. Darul Lughah Wal Karomah, atas :
        
Nama : ' . $nama . '
Alamat : ' . $alm . '
Lembaga tujuan : ' . $bg . '
jalur : ' . $lj . '
Gel :  ' . $gel . '
        
selanjutnya, silahkan melakukan  pembayaran  Biaya Pendaftaran sebesar *' . $by . '* ke *No.Rek 0582-0101-4254-500 a.n. Hadiryanto Putra Pratama* dan melakukan konfirmasi pembayaran disertai bukti transfer ke *No. WA https://wa.me/6282338631044*
    
*Terimakasih*

_*NB : Calon Santri diwajibkan memakai baju putih songkok/kerudung hitam & Bawahan bebas (Ketika tes dan berangkat mondok)*_';

$pesan2 = '*Info tambahan santri baru*
 
Nama : ' . $nama . '
Alamat : ' . $alm . '
Lembaga tujuan : ' . $bg . '
jalur : ' . $lj . '
Gel :  ' . $gel . '
No. HP : ' . $dt['hp'] . '
Waktu Daftar : ' . $dt['waktu_daftar'] . '
            
*Terimakasih*';

echo $pesan;

if ($kode == 'jpr') {

    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => 'http://8.215.26.187:3000/api/sendMessage',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'apiKey=fb209be1f23625e43cbf285e57c0c0f2&phone=' . $hp . '&message=' . $pesan,
        )
    );
    $response = curl_exec($curl);
    curl_close($curl);
    echo $response;

    // header('Location: kmanaul.php');
} else if ($kode == 'grp') {
    $curl2 = curl_init();
    curl_setopt_array(
        $curl2,
        array(
            CURLOPT_URL => 'http://8.215.26.187:3000/api/sendMessageGroup',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'apiKey=fb209be1f23625e43cbf285e57c0c0f2&id_group=INPTtXYBKdUF5FS1dEie8m&message=' . $pesan2,
        )
    );
    $response = curl_exec($curl2);
    curl_close($curl2);

    header('Location: kmanaul.php');
}