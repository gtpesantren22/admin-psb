<?php

require 'function.php';

$data = query("SELECT tb_santri.*,  
lemari.komplek, lemari.kamar, lemari.no FROM `tb_santri` 

JOIN lemari ON lemari.nis=tb_santri.nis ORDER BY tb_santri.id_santri ASC");
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

  <title>Gentelella Alela! | </title>

  <!-- Bootstrap -->
  <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- bootstrap-daterangepicker -->
  <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

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
          <div class="row">

            <!-- Data Santri -->
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>
                    Data Semua Santri <small>Santri baru</small>
                  </h2>
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
                  <button class="btn btn-primary" type="button" data-toggle="modal" data-target=".bs-example-modal-lg"><i class=" fa fa-plus"></i> Tambah Data Baru</button>
                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>No. Daftar</th>
                        <th>Nama</th>
                        <!-- <th>Alamat</th> -->
                        <th>Komplek</th>
                        <th>Kamar</th>
                        <th>No. Lemari</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1;
                      foreach ($data as $r) :
                        $l = array("", "MTs", "SMP", "MA", "SMK");
                      ?>
                        <tr>
                          <td><?= $i; ?></td>
                          <td><?= $r['nis']; ?></td>
                          <td><?= $r['nama']; ?></td>
                          <!-- <td><?= $r['kl'] . ' - ' . $r['kc'] . ' - ' . $r['kb']; ?></td> -->
                          <td><?= $r['komplek']; ?></td>
                          <td><?= $r['kamar']; ?></td>
                          <td><?= $r['no']; ?></td>
                          <td>
                            <a href="<?= 'ekam.php?nis=' . $r['nis'] ?>"><button type="button" class="btn btn-success btn-xs" <?php if ($r['komplek'] != '' || $r['kamar'] != '' || $r['no'] != '') {
                                                                                                                                echo "disabled";
                                                                                                                              } ?>>
                                Pilih Kamar</button></a>

                            <?php if ($level == 'super') { ?>
                              <a href="<?= 'hps_kamar.php?nis=' . $r['nis'] ?>" onclick="return confirm('Yakin akan dikosongi ?')"><button type="button" class="btn btn-danger btn-xs" <?php if ($r['no'] == '') {
                                                                                                                                                                                          echo "disabled";
                                                                                                                                                                                        } ?>>Kosongi</button></a>
                            <?php } ?>
                          </td>
                        </tr>
                      <?php
                        $i++;
                      endforeach;
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <div class="modal-header">
          <h4 class="modal-title" id="">Tambah Penempatan Kamar Baru</h4>
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
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
              $sql1 = mysqli_query($conn, "SELECT * FROM tb_santri WHERE NOT EXISTS (SELECT * FROM lemari WHERE lemari.nis=tb_santri.nis ) AND tb_santri.ket = 'baru' ");
              while ($row1 = mysqli_fetch_assoc($sql1)) {
              ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $row1['nama']; ?></td>
                  <td><?= $lm[$row1['lembaga']]; ?></td>
                  <td><?= $row1['ket']; ?></td>
                  <td>
                    <a href="<?= 'ekam.php?nis=' . $row1['nis'] ?>"><button class="btn btn-xs btn-success"> Pilih santri ini</button></a>
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
  <!-- Chart.js -->
  <script src="vendors/Chart.js/dist/Chart.min.js"></script>
  <!-- jQuery Sparklines -->
  <script src="vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <!-- Flot -->
  <script src="vendors/Flot/jquery.flot.js"></script>
  <script src="vendors/Flot/jquery.flot.pie.js"></script>
  <script src="vendors/Flot/jquery.flot.time.js"></script>
  <script src="vendors/Flot/jquery.flot.stack.js"></script>
  <script src="vendors/Flot/jquery.flot.resize.js"></script>
  <!-- Flot plugins -->
  <script src="vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
  <script src="vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
  <script src="vendors/flot.curvedlines/curvedLines.js"></script>
  <!-- DateJS -->
  <script src="vendors/DateJS/build/date.js"></script>
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

  <!-- bootstrap-daterangepicker -->
  <script src="vendors/moment/min/moment.min.js"></script>
  <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="build/js/custom.min.js"></script>
</body>

</html>