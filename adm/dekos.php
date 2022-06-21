<?php
require 'function.php';

$hri = date('d/m/Y');
$data = query("SELECT dekos.*, tb_santri.nama, tb_santri.lembaga,
tb_santri.kec AS kc, tb_santri.desa AS kl FROM dekos
JOIN tb_santri ON dekos.nis=tb_santri.nis ORDER BY dekos.id_kos ASC");

$h_tm = mysqli_fetch_assoc(mysqli_query($conn, "SELECT 
(SELECT COUNT(*) FROM dekos WHERE t_kos = 1 ) AS kn1,
(SELECT COUNT(*) FROM dekos WHERE t_kos = 1 AND tgl LIKE '$hri%') AS kn2,
(SELECT COUNT(*) FROM dekos WHERE t_kos = 2 ) AS gz1,
(SELECT COUNT(*) FROM dekos WHERE t_kos = 2 AND tgl LIKE '$hri%') AS gz2,
(SELECT COUNT(*) FROM dekos WHERE t_kos = 3 ) AS fh1,
(SELECT COUNT(*) FROM dekos WHERE t_kos = 3 AND tgl LIKE '$hri%') AS fh2,
(SELECT COUNT(*) FROM dekos WHERE t_kos = 4 ) AS zh1,
(SELECT COUNT(*) FROM dekos WHERE t_kos = 4 AND tgl LIKE '$hri%') AS zh2,
(SELECT COUNT(*) FROM dekos WHERE t_kos = 5 ) AS sd1,
(SELECT COUNT(*) FROM dekos WHERE t_kos = 5 AND tgl LIKE '$hri%') AS sd2,
(SELECT COUNT(*) FROM dekos WHERE t_kos = 6 ) AS mm1,
(SELECT COUNT(*) FROM dekos WHERE t_kos = 6 AND tgl LIKE '$hri%') AS mm2,
(SELECT COUNT(*) FROM dekos WHERE t_kos = 7 ) AS nl1,
(SELECT COUNT(*) FROM dekos WHERE t_kos = 7 AND tgl LIKE '$hri%') AS nl2,
(SELECT COUNT(*) FROM dekos WHERE t_kos = 8 ) AS lt1,
(SELECT COUNT(*) FROM dekos WHERE t_kos = 8 AND tgl LIKE '$hri%') AS lt2
FROM dekos LIMIT 1"));

$jal = array("", "Reguler", "Prestasi");
$lm = array("", "MTs", "SMP", "MA", "SMK");

$urlcrud = "index.php?link=pages/";
//$jns = $data['jkl'];

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
                                <div class="x_content ">
                                    <div class="row">
                                        <div class="col-md-10 ">
                                            <div class="card-box table-responsive">
                                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class=" fa fa-plus"></i> Tambah Data Baru</button>
                                                <div>
                                                    <table id="datatable" class="table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>No.</th>
                                                                <th>Nama</th>
                                                                <th>Alamat</th>
                                                                <th>Lembaga</th>
                                                                <th>Bayar</th>
                                                                <th>Tanggal</th>
                                                                <th>Tempat</th>
                                                                <?php if ($level == 'super') { ?>
                                                                    <th>#</th>
                                                                <?php } ?>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 1; ?>
                                                            <?php foreach ($data as $r) :
                                                                $tmp = array("", "Kantin", "Gus Zaini", "Ny. Farihah", "Ny. Zahro", "Ny. Sa'adah", "Ny. Mamjudah", "Ny. Naily Z.", "Ny. Lathifah");
                                                                $lm = array("", "MTs", "SMP", "MA", "SMK");
                                                            ?>
                                                                <tr>
                                                                    <td style="text-align: center"><?= $i; ?></td>
                                                                    <td><?= $r['nama']; ?> </td>
                                                                    <td><?= $r['kl'] . ' - ' . $r['kc']; ?> </td>
                                                                    <td><?= $lm[$r['lembaga']]; ?></td>
                                                                    <td><?= rupiah($r['nominal']); ?> </td>
                                                                    <td><?= $r['tgl']; ?></td>
                                                                    <td><?= $tmp[$r['t_kos']]; ?> </td>
                                                                    <?php if ($level == 'super') { ?>
                                                                        <td>
                                                                            <a href="<?= 'hapus.php?kd=kos&id=' . $r["id_kos"]; ?>" onclick="return confirm('Yakin akan dihapus ?');"><button class="btn btn-danger btn-icon btn-xs"><span class="fa fa-times"></span></button></a>
                                                                            <a href="<?= 'edit_kos.php?id=' . $r["id_kos"]; ?>"><button class="btn btn-warning btn-icon btn-xs"><span class="fa fa-edit"></span></button></a>
                                                                            <a target="_blank" href="<?= 'nota2.php?id=' . $r["id_kos"]; ?>"><button class="btn btn-success btn-icon btn-xs"><span class="fa fa-print"></span></button></a>
                                                                        </td>
                                                                    <?php } else { ?>
                                                                        <td>
                                                                            <a target="_blank" href="<?= 'nota2.php?id=' . $r["id_kos"]; ?>"><button class="btn btn-success btn-icon btn-xs"><span class="fa fa-print"></span></button></a>
                                                                        </td>
                                                                    <?php } ?>
                                                                </tr>
                                                                <?php $i++; ?>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <ul class="nav nav-pills flex-column mail-nav">
                                                <!-- 1     -->
                                                <li class="nav-item"><a class="nav-link"><i class="fa fa-user fa-fw"></i> <span class="label label-primary">Kantin</span> <br>
                                                        <span class="fa fa-sa fa-fw"></span> Hari ini <span class="label  label-primary float-right"><?= $h_tm['kn2']; ?></span><br>
                                                        <span class="fa fa-sa fa-fw"></span> Total <span class="label  label-primary float-right"><?= $h_tm['kn1']; ?></span>

                                                    </a>
                                                </li>

                                                <!-- 2 -->
                                                <li class="nav-item"><a class="nav-link"><i class="fa fa-user fa-fw"></i> <span class="label label-success">Gus Zaini</span> <br>
                                                        <span class="fa fa-sa fa-fw"></span> Hari ini <span class="label  label-success float-right"><?= $h_tm['gz2']; ?></span><br>
                                                        <span class="fa fa-sa fa-fw"></span> Total <span class="label  label-success float-right"><?= $h_tm['gz1']; ?></span>
                                                    </a>
                                                </li>

                                                <!-- 3 -->
                                                <li class="nav-item"><a class="nav-link"><i class="fa fa-user fa-fw"></i> <span class="label label-warning">Ny. Farihah</span> <br>
                                                        <span class="fa fa-sa fa-fw"></span> Hari ini <span class="label  label-warning float-right"><?= $h_tm['fh2']; ?></span><br>
                                                        <span class="fa fa-sa fa-fw"></span> Total <span class="label  label-warning float-right"><?= $h_tm['fh1']; ?></span>
                                                    </a>
                                                </li>

                                                <!-- 4 -->
                                                <li class="nav-item"><a class="nav-link"><i class="fa fa-user fa-fw"></i> <span class="label label-info">Ny. Zahro</span> <br>
                                                        <span class="fa fa-sa fa-fw"></span> Hari ini <span class="label  label-info float-right"><?= $h_tm['zh2']; ?></span><br>
                                                        <span class="fa fa-sa fa-fw"></span> Total <span class="label  label-info float-right"><?= $h_tm['zh1']; ?></span>
                                                    </a>
                                                </li>

                                                <!-- 5 -->
                                                <li class="nav-item"><a class="nav-link"><i class="fa fa-user fa-fw"></i> <span class="label label-danger">Ny. Sa'adah</span> <br>
                                                        <span class="fa fa-sa fa-fw"></span> Hari ini <span class="label  label-danger float-right"><?= $h_tm['sd2']; ?></span><br>
                                                        <span class="fa fa-sa fa-fw"></span> Total <span class="label  label-danger float-right"><?= $h_tm['sd1']; ?></span>
                                                    </a>
                                                </li>

                                                <!-- 6 -->
                                                <li class="nav-item"><a class="nav-link"><i class="fa fa-user fa-fw"></i> <span class="label label-default">Ny. Mamjudah</span> <br>
                                                        <span class="fa fa-sa fa-fw"></span> Hari ini <span class="label  label-default float-right"><?= $h_tm['mm2']; ?></span><br>
                                                        <span class="fa fa-sa fa-fw"></span> Total <span class="label  label-default float-right"><?= $h_tm['mm1']; ?></span>
                                                    </a>
                                                </li>

                                                <!-- 7 -->
                                                <li class="nav-item"><a class="nav-link"><i class="fa fa-user fa-fw"></i> <span class="label label-primary">Ny. Naily Z.</span> <br>
                                                        <span class="fa fa-sa fa-fw"></span> Hari ini <span class="label  label-primary float-right"><?= $h_tm['nl2']; ?></span><br>
                                                        <span class="fa fa-sa fa-fw"></span> Total <span class="label  label-primary float-right"><?= $h_tm['nl1']; ?></span>
                                                    </a>
                                                </li>

                                                <!-- 8 -->
                                                <li class="nav-item"><a class="nav-link"><i class="fa fa-user fa-fw"></i> <span class="label bg-green">Ny. Lathifah</span> <br>
                                                        <span class="fa fa-sa fa-fw"></span> Hari ini <span class="label bg-green float-right"><?= $h_tm['lt2']; ?></span><br>
                                                        <span class="fa fa-sa fa-fw"></span> Total <span class="label bg-green float-right"><?= $h_tm['lt1']; ?></span>
                                                    </a>
                                                </li>
                                            </ul>
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

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

</body>

</html>