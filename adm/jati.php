<?php

require '../function.php';

$jml = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_santri "));
$pa = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_santri WHERE jkl = 'Laki-laki'"));
$pi = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_santri WHERE jkl = 'Perempuan'"));

$mts = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_santri WHERE lembaga = 1 "));
$smp = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_santri WHERE lembaga = 2 "));
$ma = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_santri WHERE lembaga = 3 "));
$smk = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_santri WHERE lembaga = 4 "));

$vepa = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_santri WHERE jkl = 'Laki-laki' AND stts = 'Terverifikasi' "));
$vepi = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_santri WHERE jkl = 'Perempuan' AND stts = 'Terverifikasi' "));

$bepa = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_santri WHERE jkl = 'Laki-laki' AND stts = 'Belum Terverifikasi' "));
$bepi = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_santri WHERE jkl = 'Perempuan' AND stts = 'Belum Terverifikasi' "));


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
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- bootstrap-daterangepicker -->
  <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
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
          <div class="col-md-12 col-sm-12">
            <div class="x_panel">
              <div class="x_title">
                <h2><i class="fa fa-bars"></i> Komplek : Sunan Gunung Jati <small>Data Lemari</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="#">Settings 1</a>
                      <a class="dropdown-item" href="#">Settings 2</a>
                    </div>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <ul class="nav nav-tabs justify-content-end bar_tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link " id="home-tab" data-toggle="tab" href="#home1" role="tab" aria-controls="home" aria-selected="true">Jati 1</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile1" role="tab" aria-controls="profile" aria-selected="false">Jati 2</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact1" role="tab" aria-controls="contact" aria-selected="false">Jati 3</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="4-tab" data-toggle="tab" href="#4" role="tab" aria-controls="4" aria-selected="false">Jati 4</a>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade " id="home1" role="tabpanel" aria-labelledby="home-tab">

                    <div class="row">
                      <div class="col-md-3">
                        <h2> Lemari 1 </h2>
                        <article class="media event">
                          <?php
                          for ($i = 1; $i <= 6; $i++) {
                          ?>
                            <a class="pull-left date">
                              <p class="month">L1</p>
                              <p class="day"><span class="fa fa-check"></span></p>
                            </a>
                          <?php } ?>
                        </article>
                      </div>
                      <div class="col-md-3">
                        <h2> Lemari 2 </h2>
                        <article class="media event">
                          <?php
                          for ($i = 1; $i <= 6; $i++) {
                          ?>
                            <a class="pull-left date">
                              <p class="month">L1</p>
                              <p class="day"><span class="fa fa-check"></span></p>
                            </a>
                          <?php } ?>
                        </article>
                      </div>
                      <div class="col-md-3">
                        <h2> Lemari 3 </h2>
                        <article class="media event">
                          <?php
                          for ($i = 1; $i <= 6; $i++) {
                          ?>
                            <a class="pull-left date">
                              <p class="month">L1</p>
                              <p class="day"><span class="fa fa-check"></span></p>
                            </a>
                          <?php } ?>
                        </article>
                      </div>
                      <div class="col-md-3">
                        <h2> Lemari 4 </h2>
                        <article class="media event">
                          <?php
                          for ($i = 1; $i <= 6; $i++) {
                          ?>
                            <a class="pull-left date">
                              <p class="month">L1</p>
                              <p class="day"><span class="fa fa-check"></span></p>
                            </a>
                          <?php } ?>
                        </article>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="profile1" role="tabpanel" aria-labelledby="profile-tab">

                  </div>
                  <div class="tab-pane fade" id="contact1" role="tabpanel" aria-labelledby="contact-tab">
                    xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                    booth letterpress, commodo enim craft beer mlkshk
                  </div>
                  <div class="tab-pane fade" id="4" role="tabpanel" aria-labelledby="4-tab">
                    xxFood truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                    booth letterpress, commodo enim craft beer mlkshk
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
  <script src="../vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="../vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="../vendors/nprogress/nprogress.js"></script>
  <!-- Chart.js -->
  <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
  <!-- jQuery Sparklines -->
  <script src="../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <!-- Flot -->
  <script src="../vendors/Flot/jquery.flot.js"></script>
  <script src="../vendors/Flot/jquery.flot.pie.js"></script>
  <script src="../vendors/Flot/jquery.flot.time.js"></script>
  <script src="../vendors/Flot/jquery.flot.stack.js"></script>
  <script src="../vendors/Flot/jquery.flot.resize.js"></script>
  <!-- Flot plugins -->
  <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
  <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
  <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
  <!-- DateJS -->
  <script src="../vendors/DateJS/build/date.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="../vendors/moment/min/moment.min.js"></script>
  <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="../build/js/custom.min.js"></script>
</body>

</html>