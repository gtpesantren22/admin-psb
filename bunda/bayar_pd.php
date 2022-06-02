<?php
include 'koneksi.php';
include 'head.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_santri WHERE id_santri = '$id' "));
$lm = array("", "MTs DWK", "SMP DWK", "MA DWK", "SMK DWK");

if ($data['gel'] == '1') {
    $by = 50000;
} else if ($data['gel'] == '2') {
    $by = 100000;
} else if ($data['gel'] == '3') {
    $by = 150000;
}

if ($data['ket'] == 'lama') {
    $byOk = $by / 2;
} else {
    $byOk = $by;
}

?>

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Pembayaran Pendaftaran</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Forms</li>
            <li class="breadcrumb-item active" aria-current="page">Form Basics</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Identitas Santri</h6>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" class="form-control" value="<?= $data['nama']; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Alamat</label>
                            <input type="text" class="form-control" value="<?= $data['desa'] . ' - ' . $data['kec'] . ' - ' . $data['kab']; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Lembaga Tujuan</label>
                            <input type="text" class="form-control" value="<?= $lm[$data['lembaga']]; ?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="validationServer01">Jumlah Pembayaran</label>
                            <input type="text" class="form-control is-valid" value="<?= rupiah($byOk) . ' (santri ' . $data['ket'] . ')'; ?>" readonly>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <!-- General Element -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Input Pembayaran</h6>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="nis" value="<?= $data['nis']; ?>">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nominal</label>
                            <input type="text" class="form-control" id="uang" name="nominal" placeholder="Rp. .." required>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Tanggal Bayar</label>
                            <input type="date" class="form-control" name="tgl_bayar" placeholder="Rp. .." required>
                        </div>

                        <div class="form-group">
                            <label>Radio Button</label>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio3" name="via" class="custom-control-input" value="Transfer" required>
                                <label class="custom-control-label" for="customRadio3">Transfer</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio4" name="via" class="custom-control-input" value="Cash" required>
                                <label class="custom-control-label" for="customRadio4">Cash</label>
                            </div>
                        </div>
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan Data</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!--Row-->

    <?php include 'foot.php';

    if (isset($_POST['simpan'])) {
        $id_s = $uuid;
        $nis = $_POST['nis'];
        $nominal = preg_replace("/[^0-9]/", "", $_POST['nominal']);
        $tgl_bayar = $_POST['tgl_bayar'];
        $via = $_POST['via'];

        $pesan = '*Terimakasih*

*Kode Pembayaran : ' . strtoupper($id_s) . '*
Pembayaran Pendaftaran, atas :
        
Nama : ' . $data['nama'] . '
Alamat : ' . $data['desa'] . '-' . $data['kec'] . '-' . $data['kab'] . '
Lembaga tujuan : ' . $lm[$data['lembaga']] . '
Nominal : ' . rupiah($nominal) . '
        
*telah TERVERIFIKASI.*
selanjutnya, Silahkan bergabung Group WA Santri baru dengan klik link dibawah, untuk mengetahui informasi test pendaftaran santri baru dan Informasi Lainnya.
    
*https://chat.whatsapp.com/L8O3TgvrpLVFqMejIMoIF3*
_*Link diatas hanya untuk santri baru*_
        
_*NB : Calon Santri diwajibkan memakai baju putih songkok/kerudung hitam & Bawahan bebas (Ketika tes dan berangkat mondok)*_

*dengan membawa berkas dibawah ini :*
- Foto Copy Kartu Keluarga 4 lembar
- Foto Copy Akta Kelahiran 4 lembar
- Foto Copy IJAZAH dilegalisir ( Menyusul ) 4 lembar

*Jadwal kegiatan Gel.1 :* 
*Penyerahan berkas dan Tes : 26-28 February 2022*';

        if ($nominal > $byOk) {
            echo "
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Maaf',
                            text: 'Pembayaran Anda Melebihi Ambang Batas!'
                        });
                    </script>
                    ";
        } else {
            $sql = mysqli_query($conn, "INSERT INTO bp_daftar VALUES ('$uuid', '$nis','$nominal','$tgl_bayar','$via','$nama_user', NOW()) ");
            if ($sql) {



                mysqli_query($conn, "UPDATE tb_santri SET stts = 'Terverifikasi' WHERE nis = '$nis' ");
                mysqli_query($conn, "INSERT INTO tanggungan(id_tgn, nis, daftar) VALUES ('$id_s', '$nis', '$nominal') ");

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
                        CURLOPT_POSTFIELDS => 'apiKey=fb209be1f23625e43cbf285e57c0c0f2&phone=' . $data['hp'] . '&message=' . $pesan,
                    )
                );
                $response = curl_exec($curl);
                curl_close($curl);
                
                echo "
                    <script>
                            Swal.fire({
                                title: 'Berhasil',
                                text: 'Pembayaran Berhasil',
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
        }
    }

    ?>