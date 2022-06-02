<?php
include 'koneksi.php';
// $id = $_GET['id'];
// $kode = $_GET['kode'];
// $ket = $_GET['ket'];

$qr = mysqli_query($conn, "SELECT * FROM tb_santri WHERE gel = 3 AND ket = 'baru' ");
// $dt = mysqli_fetch_assoc($qr);


while ($dt = mysqli_fetch_assoc($qr)) {

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


    $pesan = '*INFO PANITIA PENERIMAAN SANTRI BARU 2022*
*PP. Darul Lughah Wal Karomah*
        
Nama : ' . $nama . '
Alamat : ' . $alm . '
Lembaga tujuan : ' . $bg . '
jalur : ' . $lj . '
Gel :  ' . $gel . '
        
Mohon segera melalukan verifikasi dengan melakukan  pembayaran  Biaya Pendaftaran sebesar *Rp. ' . $by . '* ke *No.Rek BRI 0582-0101-4254-500 a.n. Hadiryanto Putra Pratama* dan melakukan konfirmasi pembayaran disertai bukti transfer ke *No. WA https://wa.me/6282338631044*
    
*Terimakasih*
';

$pesan2 = '*Info Panitia Penerimaan Santri Baru*
*Pondok Pesantren Darul Lughah Wal Karomah*

_Assalamualaikum. Wr. Wb._

Kpd. Yth. Wali Santri Baru
 Pondok Pesantren Darul Lughah Wal Karomah Tahun Pelajaran 2022-2023

Berikut ini kami informasikan bahwa pelaksanaan Tes Santri Baru *Tahap 3 / Gel. 3* yang semula dilaksanakan tanggal 28-30 Mei 2022 *DIUNDUR* tanggal 4 - 5 Juni 2022 karna berbenturan dengan kegiatan Halal Bihahal IKSADA tanggal 29 Mei 2022. 
Atas perhatiannya kami sampaikan terima kasih

_Wassalamualaikum. Wr. Wb._

Ketua Panitia PSB

_*Nb : untuk santri gel 1 dan 2 yang belum mengikuti test bisa mengikuti di gel. 3*_';

// echo $pesan;

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
            CURLOPT_POSTFIELDS => 'apiKey=fb209be1f23625e43cbf285e57c0c0f2&phone=' . $hp . '&message=' . $pesan2,
            // CURLOPT_POSTFIELDS => 'apiKey=fb209be1f23625e43cbf285e57c0c0f2&phone=085236924510&message=' . $pesan2,
        )
    );
    $response = curl_exec($curl);
    curl_close($curl);
    echo $response;

}
