<?php
require 'koneksi.php';

$id = $_GET['id'];
$rw = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_santri WHERE id_santri = '$id' "));
$lembaga = $rw['lembaga'];
$gel = $rw['gel'];
$jal = $rw['jalur'];
$jk = $rw['jkl'];
if ($jk == "Laki-laki") {
    $jkl = 1;
} else {
    $jkl = 2;
}
$lm = array("", "MTs DWK", "SMP DWK", "MA DWK", "SMK DWK");

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
            $level = $user['level'];
            $nama_user = $user['nama'];
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
                                    <h2>Data Dekosan Santri <small>Santri baru</small></h2>
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
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <form>
                                                    <table border="0" style="color: green;">
                                                        <thead>
                                                            <tr>
                                                                <th>NIS Santri </th>
                                                                <th>&nbsp;</th>
                                                                <th>:</th>
                                                                <th>&nbsp;</th>
                                                                <th><?= $rw['nis']; ?></th>
                                                            </tr>
                                                            <tr height="5px">
                                                                <th colspan="3"></th>
                                                            </tr>
                                                            <tr height="5px">
                                                                <th colspan="3"></th>
                                                            </tr>
                                                            <tr>
                                                                <th>Nama </th>
                                                                <th>&nbsp;</th>
                                                                <th>:</th>
                                                                <th>&nbsp;</th>
                                                                <th><?= $rw['nama']; ?></th>
                                                            </tr>
                                                            <tr height="5px">
                                                                <th colspan="3"></th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                    <div class="form-group">
                                                        <?php
                                                        if ($jkl == "1") {
                                                            echo "<span class='label label-warning'>Laki-laki</span>";
                                                        } else {
                                                            echo "<span class='label label-warning'>Perempuan</span>";
                                                        }


                                                        if ($lembaga == 1) {
                                                            echo " - <span class='label label-default'>MTs</span>";
                                                        } elseif ($lembaga == 2) {
                                                            echo " - <span class='label label-success'>SMP</span>";
                                                        } elseif ($lembaga == 3) {
                                                            echo " - <span class='label label-primary'>MA</span>";
                                                        } else {
                                                            echo " - <span class='label label-warning'>SMK</span>";
                                                        }

                                                        if ($gel == 1) {
                                                            echo " - <span class='label label-info'>Gel 1</span>";
                                                        } else if ($gel == 2) {
                                                            echo " - <span class='label label-info'>Gel 2</span>";
                                                        } else if ($gel == 3) {
                                                            echo " - <span class='label label-info'>Gel 3</span>";
                                                        }

                                                        if ($jal == 1) {
                                                            echo " - <span class='label label-danger'>Reguler</span>";
                                                        } else {
                                                            echo " - <span class='label label-danger'>Prestasi</span>";
                                                        }
                                                        ?>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>

                                    <div class="col-lg-12">
                                        <form name="autoSumForm" method="post" action="">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <input type="hidden" name="kasir" value="<?= $bendahara; ?>">
                                                    <input type="hidden" name="nis" value="<?= $nis; ?>">
                                                    <input type="hidden" name="jkl" value="<?= $rw['jkl']; ?>">
                                                    <div class="form-group">
                                                        <fieldset>
                                                            <label class="control-label" for="">Jumlah Pembayaran</label>
                                                            <input class="form-control" type="text" id="uang" name="nominal" placeholder="Masukan Jumlah Uang">
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="form-group">
                                                        <fieldset class="form-group">
                                                            <label class="control-label" for="">Tanggal</label>
                                                            <input type="text" name="" class="form-control" value="<?= date('d/m/Y'); ?>" disabled>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2">
                                                    <br>
                                                    <button class="btn btn-success float-right" name="submit" type="submit"><i class="fa fa-check"></i>
                                                        Simpan</button>
                                                </div>
                                            </div>
                                            <div class="tile-footer">

                                            </div>
                                        </form>
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

    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="">Tambah Pembayaran Baru
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                        </button>
                    </h4>
                </div>
                <div class="modal-body">
                    <table id="datatable-responsive" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Lembaga</th>
                                <th>Ket</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            // $lm = array("", "MTs", "SMP", "MA", "SMK");
                            $sql1 = mysqli_query($conn, "SELECT * FROM tb_santri WHERE ket = 'baru' AND NOT EXISTS (SELECT * FROM dekos WHERE dekos.nis=tb_santri.nis) ");
                            while ($row1 = mysqli_fetch_assoc($sql1)) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row1['nama']; ?></td>
                                    <td><?= $lm[$row1['lembaga']]; ?></td>
                                    <td><?= $row1['ket']; ?></td>
                                    <td>
                                        <a href="<?= 'add_kos.php?id=' . $row1['id_santri'] ?>"><button class="btn btn-xs btn-success"> Bayar</button></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
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

if (isset($_POST['submit'])) {
    $nis = $rw['nis'];
    $kasir = $nama_user;
    $jkl = $rw['jkl'];
    $tgl = date("d/m/Y G:i:s");
    $nominal = preg_replace("/[^0-9]/", "", $_POST['nominal']);


    $cc = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM dekos WHERE jkl = '$jkl' ORDER BY id_kos DESC LIMIT 1"));
    $tmp = $cc['t_kos'];
    if ($tmp == '') {
        if ($jkl == 'Laki-laki') {
            $tm = 1;
        } else {
            $tm = 4;
        }
    } elseif ($tmp == 3) {
        $tm = 1;
    } elseif ($tmp == 8) {
        $tm = 4;
    }
    // elseif ($tmp == 5) {
    //     $tm = 7;
    // }
    else {
        $tm = $tmp + 1;
    }

    $qr = "INSERT INTO dekos VALUES('', '$nis','$jkl','$tgl','$nominal','$tm','$kasir' )";
    $sq = mysqli_query($conn, $qr);

    if ($sq) {
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
                                document.location.href = 'dekos.php'
                            }, millisecondsToWait);
                        </script>
                    ";
    }
}

?>