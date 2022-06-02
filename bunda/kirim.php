<?php

include 'koneksi.php';
include 'foot.php';
$kd = $_GET['kd'];
$id = $_GET['id'];
$lm = array("", "MTs DWK", "SMP DWK", "MA DWK", "SMK DWK");

if ($kd === 'rgs') {
    $dt = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM regist WHERE id_regist = '$id' "));
    $nis = $dt['nis'];
    $sn = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_santri WHERE nis = '$nis' "));
    $cek_byr = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(nominal) AS jml FROM regist WHERE nis = '$nis' GROUP BY nis "));
    $tang = mysqli_fetch_assoc(mysqli_query($conn, "SELECT *, (infaq + buku + kartu + kalender + seragam_pes + seragam_lem + orsaba) AS jml FROM tanggungan WHERE nis = '$nis' "));

    if ($sn['gel'] == '1') {
        $link = 'https://chat.whatsapp.com/L8O3TgvrpLVFqMejIMoIF3';
        $jadwal = 'Penyerahan berkas dan Tes : 26-28 February 2022';
    } else if ($sn['gel'] == '2') {
        $link = 'https://chat.whatsapp.com/Er4uy1eXYAg1PoOTZ9lnCp';
        $jadwal = 'Penyerahan berkas dan Tes : 26-28 Maret 2022';
    } else if ($sn['gel'] == '3') {
        $link = 'https://chat.whatsapp.com/FA5KGjmYmrxCGSdg1j7BPD';
        $jadwal = 'Penyerahan berkas dan Tes : 28-30 Mei 2022';
    }

    $pesan = '*Terimakasih*

*Kode Pembayaran : ' . strtoupper($id) . '*
Pembayaran Pendaftaran, atas :
        
Nama : ' . $sn['nama'] . '
Alamat : ' . $sn['desa'] . '-' . $sn['kec'] . '-' . $sn['kab'] . '
Lembaga tujuan : ' . $lm[$sn['lembaga']] . '
Nominal : ' . rupiah($dt['nominal']) . '
waktu bayar : ' . date('d-m-Y H:i:s') . '
Penerima : ' . $dt['kasir'] . '

*telah TEREGISTRASI*
selanjutnya, Silahkan bergabung Group WA Santri baru dengan klik link dibawah, untuk mengetahui informasi test pendaftaran santri baru dan Informasi Lainnya.

*' . $link . '*
_*Link diatas hanya untuk santri baru*_

*Jumlah Tanggungan : ' . rupiah($tang['jml']) . '*
*Sudah Bayar : ' . rupiah($cek_byr['jml']) . '*
*Kekurangan  : ' . rupiah($tang['jml'] - $cek_byr['jml']) . '*
        
_*NB : 
	- Calon Santri diwajibkan memakai baju putih songkok/kerudung hitam
	- Pesan ini sebgai bukti pembayaran yang sah (Harus dari WA Bendahara PSB)*_';

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
            CURLOPT_POSTFIELDS => 'apiKey=fb209be1f23625e43cbf285e57c0c0f2&phone=' . $sn['hp'] . '&message=' . $pesan,
            // CURLOPT_POSTFIELDS => 'apiKey=fb209be1f23625e43cbf285e57c0c0f2&phone=085236924510&message=' . $pesan,
        )
    );
    $response = curl_exec($curl);
    curl_close($curl);
    echo $response;

    echo "
                    <script>
                            Swal.fire({
                                title: 'Berhasil',
                                text: 'Pengiriman selesai',
                                icon: 'success',
                                showConfirmButton: false
                            });
                            var millisecondsToWait = 1000;
                            setTimeout(function() {

                                document.location.href = 'bayar_regist.php?id=" . $tang['id_tgn'] . "'
                            }, millisecondsToWait);
                        </script>
                    ";
}


if ($kd = 'df') {
    $dt = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM bp_daftar WHERE id_bayar = '$id' "));
    $nis = $dt['nis'];
    $sn = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_santri WHERE nis = '$nis' "));

    if ($sn['gel'] == '1') {
        $link = 'https://chat.whatsapp.com/L8O3TgvrpLVFqMejIMoIF3';
        $jadwal = 'Penyerahan berkas dan Tes : 26-28 February 2022';
    } else if ($sn['gel'] == '2') {
        $link = 'https://chat.whatsapp.com/Er4uy1eXYAg1PoOTZ9lnCp';
        $jadwal = 'Penyerahan berkas dan Tes : 26-28 Maret 2022';
    } else if ($sn['gel'] == '3') {
        $link = 'https://chat.whatsapp.com/FA5KGjmYmrxCGSdg1j7BPD';
        $jadwal = 'Penyerahan berkas dan Tes : 28-30 Mei 2022';
    }

    $pesan = '*Terimakasih*

*Kode Pembayaran : ' . strtoupper($id) . '*
Pembayaran Pendaftaran, atas :
        
Nama : ' . $sn['nama'] . '
Alamat : ' . $sn['desa'] . '-' . $sn['kec'] . '-' . $sn['kab'] . '
Lembaga tujuan : ' . $lm[$sn['lembaga']] . '
Nominal : ' . rupiah($dt['nominal']) . '
Tgl Bayar : ' . $dt['tgl_bayar'] . '
        
*telah TERVERIFIKASI.*
selanjutnya, Silahkan bergabung Group WA Santri baru dengan klik link dibawah, untuk mengetahui informasi test pendaftaran santri baru dan Informasi Lainnya.
    
*' . $link . '*
_*Link diatas hanya untuk santri baru*_
        
_*NB : Calon Santri diwajibkan memakai baju putih songkok/kerudung hitam dan Bawahan bebas (Ketika tes dan berangkat mondok)*_

*dengan membawa berkas dibawah ini :*
- Foto Copy Kartu Keluarga 4 lembar
- Foto Copy Akta Kelahiran 4 lembar
- Foto Copy IJAZAH dilegalisir ( Menyusul ) 4 lembar

*Jadwal kegiatan Gel.' . $sn['gel'] . ' :* 
*' . $jadwal . '*';

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
            CURLOPT_POSTFIELDS => 'apiKey=fb209be1f23625e43cbf285e57c0c0f2&phone=' . $sn['hp'] . '&message=' . $pesan,
        )
    );
    $response = curl_exec($curl);
    curl_close($curl);
    // echo $result;

    echo "
                    <script>
                            Swal.fire({
                                title: 'Berhasil',
                                text: 'Pengiriman selesai',
                                icon: 'success',
                                showConfirmButton: false
                            });
                            var millisecondsToWait = 1000;
                            setTimeout(function() {
                                document.location.href = 'bayar.php'
                            }, millisecondsToWait);
                        </script>
                    ";
}
