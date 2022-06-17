<?php
require 'function.php';

$data = mysqli_query($conn, "SELECT * FROM tb_santri ORDER BY tb_santri.id_santri ASC");

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
                                    <h2>Data Foto Santri <small>Santri baru</small></h2>
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
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>No. Foto</th>
                                                <th>Foto</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            while ($r = mysqli_fetch_assoc($data)) {
                                            ?>
                                                <tr>
                                                    <td><?= $i++; ?></td>
                                                    <td><?= $r['nama']; ?></td>
                                                    <td><?= $r['desa'] . ' - ' . $r['kec'] . ' - ' . $r['kab']; ?></td>
                                                    <td><?= $r['foto']; ?></td>
                                                    <td><img src="<?= 'foto_santri/' . $r['foto']; ?>" alt="" height="50"></td>
                                                    <td>
                                                        <a href="<?= 'foto_b.php?nis=' . $r['nis'] ?>"><button type="button" class="btn btn-info btn-xs"><span class="fa fa-camera"></span> Foto</button></a>
                                                        <a href="#" type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#myModal<?= $r['nis']; ?>"><span class="fa fa-upload"></span> Upload</a>
                                                    </td>
                                                </tr>

                                                <!-- Modal UPload -->
                                                <div class="modal fade" id="myModal<?= $r['nis']; ?>" role="dialog">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h3 class="modal-title" id="myModalLabel">Upload No. Foto (NIS : <?= $r['nis']; ?>)</h3>
                                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="" method="post">
                                                                    <?php
                                                                    $nis = $r['nis'];
                                                                    $query_edit = mysqli_query($conn, "SELECT * FROM tb_santri WHERE nis ='$nis'");
                                                                    //$result = mysqli_query($conn, $query);
                                                                    while ($row = mysqli_fetch_array($query_edit)) {
                                                                    ?>

                                                                        <input type="hidden" name="nis" value="<?= $row['nis']; ?>">

                                                                        <div class="form-group">
                                                                            <label>Nama</label>
                                                                            <input type="text" disabled class="form-control" value="<?= $row['nama']; ?>">
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <div class="form-group">
                                                                                <label>Upload Foto</label>
                                                                                <input type="file" name="foto" class="form-control" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-md-4">
                                                                                <label>Format</label>
                                                                                <input type="text" class="form-control" value="jpg/png" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <br><br><br><br>
                                                                        <div class="modal-footer">
                                                                            <button type="submit" name="save" class="btn btn-success">Update</button>
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        </div>

                                                                    <?php
                                                                    }
                                                                    //mysqli_close($host);
                                                                    ?>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
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

<?php

// $nis = $_POST['nis'];
// $no = $_POST['no'] . $_POST['tipe'];

// mysqli_query($conn, "UPDATE tb_santri SET foto = '$no' WHERE nis = '$nis' ");
// header("Location: foto.php");

?>