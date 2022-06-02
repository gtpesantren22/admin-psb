<?php
require 'function.php';
require '../bunda/libs/vendor/autoload.php';

use Ramsey\Uuid\Uuid;

$uuid = Uuid::uuid4()->toString();

$id = $_GET['id'];
$id_call = $_GET['id'];
$tang = mysqli_fetch_assoc(mysqli_query($conn, "SELECT *, (infaq + buku + kartu + kalender + seragam_pes + seragam_lem + orsaba) AS jml FROM tanggungan WHERE id_tgn = '$id' "));
$nis = $tang['nis'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_santri WHERE nis = '$nis' "));
$jkl = $data['jkl'];
$ket = $data['ket'];
$kk = $data['no_kk'];
$byr = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM biaya WHERE jkl = '$jkl' AND ket = '$ket' "));
$cek_byr = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(nominal) AS jml FROM regist WHERE nis = '$nis' GROUP BY nis "));
$cek_kk = mysqli_query($conn, "SELECT * FROM tb_santri WHERE no_kk = '$kk' AND ket = 'baru' ");


$lm = array("", "MTs DWK", "SMP DWK", "MA DWK", "SMK DWK");
$pr = array("", "Reguler", "Prestasi");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DataTables | Gentelella</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

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

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Form Registrasi Ulang Santri <small>Santri baru</small></h2>
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
                                        <div class="col-lg-7">
                                            <!-- Form Basic -->
                                            <div class="card mb-4">
                                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                    <h3 class="m-0 font-weight-bold text-primary">Identitas Santri</h6>
                                                </div>
                                                <div class="card-body">
                                                    <table width="100%">
                                                        <tr>
                                                            <th>NIS</th>
                                                            <th>:</th>
                                                            <th><?= $data['nis']; ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Nama</th>
                                                            <th>:</th>
                                                            <th><?= $data['nama']; ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Alamat</th>
                                                            <th>:</th>
                                                            <th><?= $data['desa'] . '-' . $data['kec'] . '-' . $data['kab']; ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Lembaga</th>
                                                            <th>:</th>
                                                            <th><?= $lm[$data['lembaga']]; ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Jkl</th>
                                                            <th>:</th>
                                                            <th><?= $data['jkl']; ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Gelombang</th>
                                                            <th>:</th>
                                                            <th>Gel. <?= $data['gel']; ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Jalur</th>
                                                            <th>:</th>
                                                            <th><?= $pr[$data['jalur']]; ?></th>
                                                        </tr>
                                                        <?php if (mysqli_num_rows($cek_kk) > 1) { ?>
                                                            <tr>
                                                                <th colspan="3"><span class="badge badge-primary"><?= mysqli_num_rows($cek_kk); ?> Bersaudara : </span>
                                                                    <?php while ($a = mysqli_fetch_assoc($cek_kk)) { ?>
                                                                        <span class="badge badge-danger"><?= $a['nama']; ?> (<?= $a['ket']; ?>)</span>
                                                                    <?php } ?>
                                                                </th>
                                                            </tr>
                                                        <?php } ?>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-5">
                                            <div class="alert alert-success " role="alert">
                                                <strong> Tanggungan : <?= rupiah($tang['jml']); ?></strong>
                                            </div>
                                            <div class="alert alert-warning " role="alert">
                                                Uang Masuk : <?= rupiah($cek_byr['jml']); ?>
                                            </div>
                                            <div class="alert alert-danger " role="alert">
                                                Kurang : <?= rupiah($tang['jml'] - $cek_byr['jml']); ?>
                                            </div>
                                        </div>

                                        <div class="col-lg-7">
                                            <!-- Form Basic -->
                                            <div class="card mb-4">
                                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                    <h3 class="m-0 font-weight-bold text-primary">Tanggungan santri
                                                        <button type="button" data-toggle="modal" data-target="#exampleModal" id="#myBtn" class="btn btn-primary btn-sm pull-right">Generate Tanggungan</button>
                                                        </h6>
                                                </div>
                                                <div class="card-body">
                                                    <table width="100%" class="table table-sm table-bordered">
                                                        <tr>
                                                            <th>Uang Gedung</th>
                                                            <th><?= rupiah($tang['infaq']); ?> <?= mysqli_num_rows($cek_kk) > 1 ? '(50%)' : '' ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Buku Pedoman Wiridan, Perizinan & Tatib</th>
                                                            <th><?= rupiah($tang['buku']); ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>KTS, Kartu Mahrom, Kartu Kesehatan & Foto</th>
                                                            <th><?= rupiah($tang['kartu']); ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Kalender Pesantren</th>
                                                            <th><?= rupiah($tang['kalender']); ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Seragam Pesantren</th>
                                                            <th><?= rupiah($tang['seragam_pes']); ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>Seragam Lembaga (Khas dan Olahraga)</th>
                                                            <th><?= rupiah($tang['seragam_lem']); ?> <?= $data['jalur'] == 2 ? '(gratis)' : '' ?></th>
                                                        </tr>
                                                        <tr>
                                                            <th>ORSABA</th>
                                                            <th><?= rupiah($tang['orsaba']); ?></th>
                                                        </tr>
                                                        <tr style="background-color: lightslategray; color: white;">
                                                            <th>Total</th>
                                                            <th><?= rupiah($tang['jml']); ?></th>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-5">
                                            <!-- General Element -->
                                            <div class="card mb-4">
                                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                    <h3 class="m-0 font-weight-bold text-primary">Input Pembayaran</h6>
                                                </div>
                                                <div class="card-body">
                                                    <form action="" method="post" class="form-horizontal form-label-left">
                                                        <input type="hidden" name="nis" value="<?= $data['nis']; ?>">

                                                        <div class="form-group ">
                                                            <label class=" ">Nominal</label>
                                                            <input type="text" class="form-control" id="uang" name="nominal" placeholder="Rp. .." required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">Tanggal Bayar</label>

                                                            <input type="date" class="form-control" name="tgl_bayar" placeholder="Rp. .." required>

                                                        </div>
                                                        <div class="form-group">
                                                            <label class="">Via</label>

                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="customRadio3" name="via" class="custom-control-input" value="Transfer" required>
                                                                <label class="custom-control-label" for="customRadio3">Transfer</label>
                                                            </div>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="customRadio4" name="via" class="custom-control-input" value="Cash" required>
                                                                <label class="custom-control-label" for="customRadio4">Cash</label>
                                                            </div>

                                                        </div>
                                                        <div class="form-group">
                                                            <label class=""></label>

                                                            <button type="submit" name="simpan" class="btn btn-primary float-right">Simpan Data</button>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-lg-12">
                                            <!-- Form Basic -->
                                            <div class="card mb-4">
                                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                    <h3 class="m-0 font-weight-bold text-primary">History Pembayaran Santri</h6>
                                                </div>
                                                <div class="card-body">
                                                    <table width="100%" class="table table-sm table-bordered" id="datatable">
                                                        <thead style="background-color: limegreen; color: linen;">
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Tgl Bayar</th>
                                                                <th>Penerima</th>
                                                                <th>Via</th>
                                                                <th>Waktu Input</th>
                                                                <th>Nominal</th>
                                                                <th>#</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $no = 1;
                                                            $rg = mysqli_query($conn, "SELECT * FROM regist WHERE nis = '$nis' ");
                                                            while ($a = mysqli_fetch_assoc($rg)) { ?>
                                                                <tr>
                                                                    <td><?= $no++; ?></td>
                                                                    <td><?= $a['tgl_bayar']; ?></td>
                                                                    <td><?= $a['kasir']; ?></td>
                                                                    <td><?= $a['via']; ?></td>
                                                                    <td><?= $a['created']; ?></td>
                                                                    <td><?= rupiah($a['nominal']); ?></td>
                                                                    <td>
                                                                        <div class="btn-group">
                                                                            <button class="btn btn-primary btn-xs" type="button"><i class="fa fa-print"></i></button>
                                                                            <a href="kirim.php?kd=rgs&id=<?= $a['id_regist']; ?>" onclick="return confirm('Yakin akan dikirm ?')" class="btn btn-success btn-xs" type="button"><i class="fa fa-send"></i></a>
                                                                            <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#eddit<?= $a['id_regist']; ?>" id="#myBtn"><i class="fa fa-edit"></i></button>
                                                                            <a href="hapus.php?kd=rgs&id=<?= $a['id_regist']; ?>" onclick="return confirm('Yakin akan dihapus ?')">
                                                                                <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>
                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                    <!-- Modal -->
                                                                    <div class="modal fade" id="eddit<?= $a['id_regist']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Pembayaran Santri</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form action="" method="post">
                                                                                        <input type="hidden" name="id" value="<?= $a['id_regist']; ?>">
                                                                                        <input type="hidden" name="asal" value="<?= $a['nominal']; ?>">
                                                                                        <b>Tgl Input : <?= $a['created'] ?><br>
                                                                                            Penerima : <?= $a['kasir'] ?>
                                                                                        </b>
                                                                                        <hr>
                                                                                        <div class="form-group">
                                                                                            <label for="exampleFormControlInput1">Nominal</label>
                                                                                            <input type="text" class="form-control" id="uang3" name="nominal" placeholder="Rp. .." value="<?= $a['nominal']; ?>" required>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="exampleFormControlInput1">Tgl Bayar</label>
                                                                                            <input type="date" class="form-control" name="tgl_bayar" placeholder="Rp. .." value="<?= $a['tgl_bayar']; ?>" required>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="exampleFormControlInput1">Via Pembayaran</label>
                                                                                            <div class="custom-control custom-radio">
                                                                                                <input type="radio" id="customRadio3" name="via" class="custom-control-input" value="Transfer" required <?= $a['via'] == 'Transfer' ? 'checked' : ''; ?>>
                                                                                                <label class="custom-control-label" for="customRadio3">Transfer</label>
                                                                                            </div>
                                                                                            <div class="custom-control custom-radio">
                                                                                                <input type="radio" id="customRadio4" name="via" class="custom-control-input" value="Cash" required <?= $a['via'] == 'Cash' ? 'checked' : ''; ?>>
                                                                                                <label class="custom-control-label" for="customRadio4">Cash</label>
                                                                                            </div>
                                                                                        </div>
                                                                                        <button type="submit" name="upp" class="btn btn-primary">Simpan Data</button>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </tr>
                                                            <?php } ?>
                                                        </tbody>
                                                        <tfoot style="background-color: limegreen; color: linen;">
                                                            <tr>
                                                                <th colspan="5">TOTAL</th>
                                                                <th colspan="2"><?= rupiah($cek_byr['jml']); ?></th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buat Tanggungan Santri</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input type="hidden" name="nis" value="<?= $data['nis']; ?>">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nominal Infaq yang dipilih</label>
                            <input type="text" class="form-control" id="uang2" name="infaq" placeholder="Rp. .." required>
                        </div>
                        <button type="submit" name="add" class="btn btn-primary">Simpan Data</button>
                    </form>
                </div>
            </div>
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
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="../bunda/vendor/sw/sweetalert2.all.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

    <script type="text/javascript">
        var rupiah = document.getElementById('uang');
        var rupiah2 = document.getElementById('uang2');
        var rupiah3 = document.getElementById('uang3');

        rupiah.addEventListener('keyup', function(e) {
            rupiah.value = formatRupiah(this.value);
        });
        rupiah2.addEventListener('keyup', function(e) {
            rupiah2.value = formatRupiah(this.value);
        });
        rupiah3.addEventListener('keyup', function(e) {
            rupiah3.value = formatRupiah(this.value);
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
$nama_user = $user['nama'];

if (isset($_POST['add'])) {

    $nis = $_POST['nis'];
    $infaq = preg_replace("/[^0-9]/", "", $_POST['infaq']);
    $buku = preg_replace("/[^0-9]/", "", $byr['buku']);
    $kartu = preg_replace("/[^0-9]/", "", $byr['kartu']);
    $kalender = preg_replace("/[^0-9]/", "", $byr['kalender']);
    $seragam_pes = preg_replace("/[^0-9]/", "", $byr['seragam_pes']);
    $seragam_lem = preg_replace("/[^0-9]/", "", $byr['seragam_lem']);
    $orsaba = preg_replace("/[^0-9]/", "", $byr['orsaba']);

    if (mysqli_num_rows($cek_kk) > 1) {
        $infaqOk = $infaq / 2;
    } else {
        $infaqOk = $infaq;
    }

    if ($data['jalur'] == 2) {
        $seragam_lemOK = 0;
    } else {
        $seragam_lemOK = $seragam_lem;
    }


    $sql = mysqli_query($conn, "UPDATE tanggungan SET infaq = '$infaqOk', buku = '$buku', kartu = '$kartu', kalender = '$kalender', seragam_pes = '$seragam_pes', seragam_lem = '$seragam_lemOK', orsaba = '$orsaba' WHERE nis = '$nis' ");
    if ($sql) {
        mysqli_query($conn, "UPDATE tb_santri SET stts = 'Terverifikasi' WHERE nis = '$nis' ");
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
                                document.location.href = 'bayar_regist.php?id=" . $id_call . "'
                            }, millisecondsToWait);
                        </script>
                    ";
    }
}

if (isset($_POST['simpan'])) {
    $id_s = $uuid;
    $nis = $_POST['nis'];
    $nominal = preg_replace("/[^0-9]/", "", $_POST['nominal']);
    $tgl_bayar = $_POST['tgl_bayar'];
    $via = $_POST['via'];

    $jml_bayar = $nominal + $cek_byr['jml'];

    if ($data['gel'] == '1') {
        $link = 'https://chat.whatsapp.com/L8O3TgvrpLVFqMejIMoIF3';
        $jadwal = 'Penyerahan berkas dan Tes : 26-28 February 2022';
    } else if ($data['gel'] == '2') {
        $link = 'https://chat.whatsapp.com/Er4uy1eXYAg1PoOTZ9lnCp';
        $jadwal = 'Penyerahan berkas dan Tes : 26-28 Maret 2022';
    } else if ($data['gel'] == '3') {
        $link = 'https://chat.whatsapp.com/FA5KGjmYmrxCGSdg1j7BPD';
        $jadwal = 'Penyerahan berkas dan Tes : 28-30 Mei 2022';
    }

    $pesan = '*Terimakasih*

*Kode Pembayaran : ' . strtoupper($id_s) . '*
Pembayaran Pendaftaran, atas :
        
Nama : ' . $data['nama'] . '
Alamat : ' . $data['desa'] . '-' . $data['kec'] . '-' . $data['kab'] . '
Lembaga tujuan : ' . $lm[$data['lembaga']] . '
Nominal : ' . rupiah($nominal) . '
waktu bayar : ' . date('d-m-Y H:i:s') . '
Penerima : ' . $nama_user . '

*telah TEREGISTRASI*
selanjutnya, Silahkan bergabung Group WA Santri baru dengan klik link dibawah, untuk mengetahui informasi test pendaftaran santri baru dan Informasi Lainnya.

*' . $link . '*
_*Link diatas hanya untuk santri baru*_

*Jumlah Tanggungan : ' . rupiah($tang['jml']) . '*
*Sudah Bayar : ' . rupiah($jml_bayar) . '*
*Kekurangan  : ' . rupiah($tang['jml'] - $jml_bayar) . '*
        
_*NB : 
	- Calon Santri diwajibkan memakai baju putih songkok/kerudung hitam
	- Pesan ini sebgai bukti pembayaran yang sah (Harus dari WA Bendahara PSB)*_';

    if ($jml_bayar > $tang['jml']) {
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
        $sql = mysqli_query($conn, "INSERT INTO regist VALUES ('$uuid', '$nis','$nominal','$tgl_bayar','$via','$nama_user', NOW()) ");

        if ($sql) {
            mysqli_query($conn, "UPDATE tb_santri SET stts = 'Terverifikasi' WHERE nis = '$nis' ");
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
                                document.location.href = 'bayar_regist.php?id=" . $id_call . "'
                            }, millisecondsToWait);
                        </script>
                    ";

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
        }
    }
}

if (isset($_POST['upp'])) {
    $id_s = $uuid;
    $idss = $_POST['id'];
    $nominal = preg_replace("/[^0-9]/", "", $_POST['nominal']);
    $tgl_bayar = $_POST['tgl_bayar'];
    $via = $_POST['via'];
    $asal = $cek_byr['jml'] - preg_replace("/[^0-9]/", "", $_POST['asal']);

    $jml_bayar = $nominal +  $asal;


    if ($jml_bayar > $tang['jml']) {
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
        $sql = mysqli_query($conn, "UPDATE regist SET nominal = '$nominal', tgl_bayar = '$tgl_bayar', via = '$via' WHERE id_regist = '$idss' ");

        if ($sql) {
            echo "
                    <script>
                            Swal.fire({
                                title: 'Berhasil',
                                text: 'Pembayaran Berhasil Diupdate',
                                icon: 'success',
                                showConfirmButton: false
                            });
                            var millisecondsToWait = 1000;
                            setTimeout(function() {
                                document.location.href = 'bayar_regist.php?id=" . $id_call . "'
                            }, millisecondsToWait);
                        </script>
                    ";
        }
    }
}


?>