<?php

require 'function.php';
require '../bunda/libs/vendor/autoload.php';

use Ramsey\Uuid\Uuid;

$uuid = Uuid::uuid4()->toString();

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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">

            <!-- top navigation -->
            <?php include 'nav.php';
            ?>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Registrasi</h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">Go!</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Pembayaran Pendaftaran Santri <small>untuk melihat data santri secara detail</small></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
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
                                                            <label>Via</label>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- morris.js -->
    <script src="vendors/raphael/raphael.min.js"></script>
    <script src="vendors/morris.js/morris.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="../bunda/vendor/sw/sweetalert2.all.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

    <script type="text/javascript">
        var rupiah = document.getElementById('uang');

        rupiah.addEventListener('keyup', function(e) {
            rupiah.value = formatRupiah(this.value);
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    </script>
</body>

</html>

<?php
if (isset($_POST['simpan'])) {
    $id_s = $uuid;
    $nis = $_POST['nis'];
    $nominal = preg_replace("/[^0-9]/", "", $_POST['nominal']);
    $tgl_bayar = $_POST['tgl_bayar'];
    $via = $_POST['via'];
    $nama_user = $user['nama'];

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
        
_*NB : Calon Santri diwajibkan memakai baju putih songkok/kerudung hitam dan Bawahan bebas (Ketika tes dan berangkat mondok)*_

*dengan membawa berkas dibawah ini :*
- Foto Copy Kartu Keluarga 4 lembar
- Foto Copy Akta Kelahiran 4 lembar
- Foto Copy IJAZAH dilegalisir ( Menyusul ) 4 lembar

*Jadwal kegiatan Gel.1 :* 
*Penyerahan berkas dan Tes : 26-28 February 2022*';

    if ($nominal != $byOk) {
        echo "
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Maaf',
                            text: 'Pembayaran Anda Tidak sesuai nominal!'
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
                    // CURLOPT_POSTFIELDS => 'apiKey=fb209be1f23625e43cbf285e57c0c0f2&phone=' . $data['hp'] . '&message=' . $pesan,
                    CURLOPT_POSTFIELDS => 'apiKey=fb209be1f23625e43cbf285e57c0c0f2&phone=085236924510&message=' . $pesan,
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
                                document.location.href = 'daftar.php'
                            }, millisecondsToWait);
                        </script>
                    ";
        }
    }
}
?>