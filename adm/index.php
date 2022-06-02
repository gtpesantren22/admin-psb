<?php

include 'function.php';

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
      <?php
      include 'nav.php';
      ?>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="row top_tiles">
            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-users"></i></div>
                <div class="count"><?= $jml; ?></div>
                <h3>Semua Santri</h3>
                <p>Data seluruh santri baru</p>
              </div>
            </div>
            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-comments-o"></i></div>
                <div class="count"><?= $pa; ?></div>
                <h3>Santri Putra</h3>
                <p>Jumlah santri putra terdaftar</p>
              </div>
            </div>
            <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
                <div class="count"><?= $pi; ?></div>
                <h3>Santri Putri</h3>
                <p>Jumlah santri putri terdaftar</p>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-md-4">
              <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                  <h2>Perlembaga</h2>
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
                  <table class="" style="width:100%">
                    <tr>
                      <th style="width:37%;">
                        <p>Data</p>
                      </th>
                      <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                          <p class="">Lembaga</p>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                          <p class="">Jumlah</p>
                        </div>
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <canvas class="canvasDoughnut" height="140" width="140" style="margin: 10px 10px 10px 0"></canvas>
                      </td>
                      <td>
                        <table class="tile_info">
                          <tr>
                            <td>
                              <p><i class="fa fa-square blue"></i>MTs </p>
                            </td>
                            <td><?= $mts ?> </td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square green"></i>SMP </p>
                            </td>
                            <td><?= $smp ?> </td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square aero"></i>MA </p>
                            </td>
                            <td><?= $ma ?> </td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square red"></i>SMK </p>
                            </td>
                            <td><?= $smk ?> </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>

            <div class="col-md-8">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Status Santri <small>Terverifikasi / belum</small></h2>
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
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-6">
                      <p><b>Terverifikasi</b></p>
                      <article class="media event">
                        <a class="pull-left date">
                          <p class="month">Putra</p>
                          <p class="day"><?= $vepa; ?></p>
                        </a>
                        <div class="media-body">
                          <a class="title" href="#">Jml santri Putra</a>
                          <p>Jumlah santri putra yang sudah terverifikasi</p>
                        </div>
                      </article>
                      <article class="media event">
                        <a class="pull-left date">
                          <p class="month">Putri</p>
                          <p class="day"><?= $vepi; ?></p>
                        </a>
                        <div class="media-body">
                          <a class="title" href="#">Jml santri Putri</a>
                          <p>Jumlah santri putri yang sudah terverifikasi</p>
                        </div>
                      </article>
                    </div>
                    <div class="col-md-6">
                      <p><b>Belum Terverifikasi</b></p>
                      <article class="media event">
                        <a class="pull-left date">
                          <p class="month">Putra</p>
                          <p class="day"><?= $bepa; ?></p>
                        </a>
                        <div class="media-body">
                          <a class="title" href="#">Jml santri Putra</a>
                          <p>Jumlah santri putra yang sudah belum terverifikasi</p>
                        </div>
                      </article>
                      <article class="media event">
                        <a class="pull-left date">
                          <p class="month">Putri</p>
                          <p class="day"><?= $bepi; ?></p>
                        </a>
                        <div class="media-body">
                          <a class="title" href="#">Jml santri Putri</a>
                          <p>Jumlah santri putri yang sudah belum terverifikasi</p>
                        </div>
                      </article>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Pricing Tables Design</h2>
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

                  <!-- MTs Data -->
                  <div class="col-md-3 col-sm-6 ">
                    <div class="pricing">
                      <div class="title">
                        <?php
                        $mt1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 1 AND jkl = 'Laki-laki') AS ml,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 1 AND jkl = 'Perempuan') AS mp,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 1 AND gel = 1 AND jkl = 'Laki-laki' AND stts = 'Terverifikasi') AS lv,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 1 AND gel = 1 AND jkl = 'Laki-laki' AND stts = 'Belum Terverifikasi') AS lb,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 1 AND gel = 1 AND jkl = 'Perempuan' AND stts = 'Terverifikasi') AS pv,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 1 AND gel = 1 AND jkl = 'Perempuan' AND stts = 'Belum Terverifikasi') AS pb
                            FROM tb_santri GROUP BY gel LIMIT 1"));
                        ?>
                        <h2>Data MTs</h2>
                        <h1><?= $mts ?> Santri</h1>
                        <span>Putra : <?= $mt1['ml'] ?> | Putri : <?= $mt1['mp'] ?></span>
                      </div>
                      <div class="x_content">
                        <div class="pricing_features">
                          <ul class="list-unstyled text-left">
                            <span class="label label-info">GELOMBANG 1</span> : <?= $mt1['lv'] + $mt1['lb'] + $mt1['pv'] + $mt1['pb'] ?> santri
                            <li><i class="fa fa-check text-success"></i> <strong class="text-success">Terverifikasi </strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putra : <strong> <?= $mt1['lv'] ?> Santri</strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putri : <strong> <?= $mt1['pv']  ?> Santri</strong></li>
                            <li><i class="fa fa-times text-danger"></i> <strong class="text-danger">Belum Terverifikasi</strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putra : <strong> <?= $mt1['lb']  ?> Santri</strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putri : <strong> <?= $mt1['pb'] ?> Santri</strong></li>
                          </ul>
                          <hr>
                          <ul class="list-unstyled text-left">
                            <?php
                            $mt2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT 
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 1 AND gel = 2 AND jkl = 'Laki-laki' AND stts = 'Terverifikasi') AS lv,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 1 AND gel = 2 AND jkl = 'Laki-laki' AND stts = 'Belum Terverifikasi') AS lb,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 1 AND gel = 2 AND jkl = 'Perempuan' AND stts = 'Terverifikasi') AS pv,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 1 AND gel = 2 AND jkl = 'Perempuan' AND stts = 'Belum Terverifikasi') AS pb
                            FROM tb_santri GROUP BY gel LIMIT 1"));
                            ?>
                            <span class="label label-warning">GELOMBANG 2</span> : <?= $mt2['lv'] + $mt2['lb'] + $mt2['pv'] + $mt2['pb'] ?> santri
                            <li><i class="fa fa-check text-success"></i> <strong class="text-success">Terverifikasi </strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putra : <strong> <?= $mt2['lv'] ?> Santri</strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putri : <strong> <?= $mt2['pv']  ?> Santri</strong></li>
                            <li><i class="fa fa-times text-danger"></i> <strong class="text-danger">Belum Terverifikasi</strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putra : <strong> <?= $mt2['lb']  ?> Santri</strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putri : <strong> <?= $mt2['pb'] ?> Santri</strong></li>
                          </ul>
                          <hr>
                          <ul class="list-unstyled text-left">
                            <?php
                            $mt3 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 1 AND jkl = 'Laki-laki') AS ml,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 1 AND jkl = 'Perempuan') AS mp,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 1 AND gel = 3 AND jkl = 'Laki-laki' AND stts = 'Terverifikasi') AS lv,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 1 AND gel = 3 AND jkl = 'Laki-laki' AND stts = 'Belum Terverifikasi') AS lb,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 1 AND gel = 3 AND jkl = 'Perempuan' AND stts = 'Terverifikasi') AS pv,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 1 AND gel = 3 AND jkl = 'Perempuan' AND stts = 'Belum Terverifikasi') AS pb
                            FROM tb_santri GROUP BY gel LIMIT 1"));
                            ?>
                            <span class="label label-danger">GELOMBANG 3</span> : <?= $mt3['lv'] + $mt3['lb'] + $mt3['pv'] + $mt3['pb'] ?> santri
                            <li><i class="fa fa-check text-success"></i> <strong class="text-success">Terverifikasi </strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putra : <strong> <?= $mt3['lv'] ?> Santri</strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putri : <strong> <?= $mt3['pv']  ?> Santri</strong></li>
                            <li><i class="fa fa-times text-danger"></i> <strong class="text-danger">Belum Terverifikasi</strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putra : <strong> <?= $mt3['lb']  ?> Santri</strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putri : <strong> <?= $mt3['pb'] ?> Santri</strong></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- SMP Data -->
                  <div class="col-md-3 col-sm-6 ">
                    <div class="pricing">
                      <div class="title">
                        <?php
                        $sm1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 2 AND jkl = 'Laki-laki') AS ml,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 2 AND jkl = 'Perempuan') AS mp,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 2 AND gel = 1 AND jkl = 'Laki-laki' AND stts = 'Terverifikasi') AS lv,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 2 AND gel = 1 AND jkl = 'Laki-laki' AND stts = 'Belum Terverifikasi') AS lb,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 2 AND gel = 1 AND jkl = 'Perempuan' AND stts = 'Terverifikasi') AS pv,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 2 AND gel = 1 AND jkl = 'Perempuan' AND stts = 'Belum Terverifikasi') AS pb
                            FROM tb_santri GROUP BY gel LIMIT 1"));
                        ?>
                        <h2>Data SMP</h2>
                        <h1><?= $smp ?> Santri</h1>
                        <span>Putra : <?= $sm1['ml'] ?> | Putri : <?= $sm1['mp'] ?></span>
                      </div>
                      <div class="x_content">
                        <div class="pricing_features">
                          <ul class="list-unstyled text-left">
                            <span class="label label-info">GELOMBANG 1</span> : <?= $sm1['lv'] + $sm1['lb'] + $sm1['pv'] + $sm1['pb'] ?> santri
                            <li><i class="fa fa-check text-success"></i> <strong class="text-success">Terverifikasi </strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putra : <strong> <?= $sm1['lv'] ?> Santri</strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putri : <strong> <?= $sm1['pv']  ?> Santri</strong></li>
                            <li><i class="fa fa-times text-danger"></i> <strong class="text-danger">Belum Terverifikasi</strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putra : <strong> <?= $sm1['lb']  ?> Santri</strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putri : <strong> <?= $sm1['pb'] ?> Santri</strong></li>
                          </ul>
                          <hr>
                          <ul class="list-unstyled text-left">
                            <?php
                            $sm2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT 
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 2 AND gel = 2 AND jkl = 'Laki-laki' AND stts = 'Terverifikasi') AS lv,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 2 AND gel = 2 AND jkl = 'Laki-laki' AND stts = 'Belum Terverifikasi') AS lb,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 2 AND gel = 2 AND jkl = 'Perempuan' AND stts = 'Terverifikasi') AS pv,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 2 AND gel = 2 AND jkl = 'Perempuan' AND stts = 'Belum Terverifikasi') AS pb
                            FROM tb_santri GROUP BY gel LIMIT 1"));
                            ?>
                            <span class="label label-warning">GELOMBANG 2</span> : <?= $sm2['lv'] + $sm2['lb'] + $sm2['pv'] + $sm2['pb'] ?> santri
                            <li><i class="fa fa-check text-success"></i> <strong class="text-success">Terverifikasi </strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putra : <strong> <?= $sm2['lv'] ?> Santri</strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putri : <strong> <?= $sm2['pv']  ?> Santri</strong></li>
                            <li><i class="fa fa-times text-danger"></i> <strong class="text-danger">Belum Terverifikasi</strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putra : <strong> <?= $sm2['lb']  ?> Santri</strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putri : <strong> <?= $sm2['pb'] ?> Santri</strong></li>
                          </ul>
                          <hr>
                          <ul class="list-unstyled text-left">
                            <?php
                            $sm3 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 2 AND jkl = 'Laki-laki') AS ml,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 2 AND jkl = 'Perempuan') AS mp,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 2 AND gel = 3 AND jkl = 'Laki-laki' AND stts = 'Terverifikasi') AS lv,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 2 AND gel = 3 AND jkl = 'Laki-laki' AND stts = 'Belum Terverifikasi') AS lb,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 2 AND gel = 3 AND jkl = 'Perempuan' AND stts = 'Terverifikasi') AS pv,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 2 AND gel = 3 AND jkl = 'Perempuan' AND stts = 'Belum Terverifikasi') AS pb
                            FROM tb_santri GROUP BY gel LIMIT 1"));
                            ?>
                            <span class="label label-danger">GELOMBANG 3</span> : <?= $sm3['lv'] + $sm3['lb'] + $sm3['pv'] + $sm3['pb'] ?> santri
                            <li><i class="fa fa-check text-success"></i> <strong class="text-success">Terverifikasi </strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putra : <strong> <?= $sm3['lv'] ?> Santri</strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putri : <strong> <?= $sm3['pv']  ?> Santri</strong></li>
                            <li><i class="fa fa-times text-danger"></i> <strong class="text-danger">Belum Terverifikasi</strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putra : <strong> <?= $sm3['lb']  ?> Santri</strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putri : <strong> <?= $sm3['pb'] ?> Santri</strong></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- MA Data -->
                  <div class="col-md-3 col-sm-6 ">
                    <div class="pricing">
                      <div class="title">
                        <?php
                        $md1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 3 AND jkl = 'Laki-laki') AS ml,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 3 AND jkl = 'Perempuan') AS mp,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 3 AND gel = 1 AND jkl = 'Laki-laki' AND stts = 'Terverifikasi') AS lv,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 3 AND gel = 1 AND jkl = 'Laki-laki' AND stts = 'Belum Terverifikasi') AS lb,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 3 AND gel = 1 AND jkl = 'Perempuan' AND stts = 'Terverifikasi') AS pv,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 3 AND gel = 1 AND jkl = 'Perempuan' AND stts = 'Belum Terverifikasi') AS pb
                            FROM tb_santri GROUP BY gel LIMIT 1"));
                        ?>
                        <h2>Data MA</h2>
                        <h1><?= $ma ?> Santri</h1>
                        <span>Putra : <?= $md1['ml'] ?> | Putri : <?= $md1['mp'] ?></span>
                      </div>
                      <div class="x_content">
                        <div class="pricing_features">
                          <ul class="list-unstyled text-left">
                            <span class="label label-info">GELOMBANG 1</span> : <?= $md1['lv'] + $md1['lb'] + $md1['pv'] + $md1['pb'] ?> santri
                            <li><i class="fa fa-check text-success"></i> <strong class="text-success">Terverifikasi </strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putra : <strong> <?= $md1['lv'] ?> Santri</strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putri : <strong> <?= $md1['pv']  ?> Santri</strong></li>
                            <li><i class="fa fa-times text-danger"></i> <strong class="text-danger">Belum Terverifikasi</strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putra : <strong> <?= $md1['lb']  ?> Santri</strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putri : <strong> <?= $md1['pb'] ?> Santri</strong></li>
                          </ul>
                          <hr>
                          <ul class="list-unstyled text-left">
                            <?php
                            $md2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT 
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 3 AND gel = 2 AND jkl = 'Laki-laki' AND stts = 'Terverifikasi') AS lv,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 3 AND gel = 2 AND jkl = 'Laki-laki' AND stts = 'Belum Terverifikasi') AS lb,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 3 AND gel = 2 AND jkl = 'Perempuan' AND stts = 'Terverifikasi') AS pv,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 3 AND gel = 2 AND jkl = 'Perempuan' AND stts = 'Belum Terverifikasi') AS pb
                            FROM tb_santri GROUP BY gel LIMIT 1"));
                            ?>
                            <span class="label label-warning">GELOMBANG 2</span> : <?= $md2['lv'] + $md2['lb'] + $md2['pv'] + $md2['pb'] ?> santri
                            <li><i class="fa fa-check text-success"></i> <strong class="text-success">Terverifikasi </strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putra : <strong> <?= $md2['lv'] ?> Santri</strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putri : <strong> <?= $md2['pv']  ?> Santri</strong></li>
                            <li><i class="fa fa-times text-danger"></i> <strong class="text-danger">Belum Terverifikasi</strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putra : <strong> <?= $md2['lb']  ?> Santri</strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putri : <strong> <?= $md2['pb'] ?> Santri</strong></li>
                          </ul>
                          <hr>
                          <ul class="list-unstyled text-left">
                            <?php
                            $md3 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 3 AND jkl = 'Laki-laki') AS ml,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 3 AND jkl = 'Perempuan') AS mp,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 3 AND gel = 3 AND jkl = 'Laki-laki' AND stts = 'Terverifikasi') AS lv,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 3 AND gel = 3 AND jkl = 'Laki-laki' AND stts = 'Belum Terverifikasi') AS lb,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 3 AND gel = 3 AND jkl = 'Perempuan' AND stts = 'Terverifikasi') AS pv,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 3 AND gel = 3 AND jkl = 'Perempuan' AND stts = 'Belum Terverifikasi') AS pb
                            FROM tb_santri GROUP BY gel LIMIT 1"));
                            ?>
                            <span class="label label-danger">GELOMBANG 3</span> : <?= $md3['lv'] + $md3['lb'] + $md3['pv'] + $md3['pb'] ?> santri
                            <li><i class="fa fa-check text-success"></i> <strong class="text-success">Terverifikasi </strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putra : <strong> <?= $md3['lv'] ?> Santri</strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putri : <strong> <?= $md3['pv']  ?> Santri</strong></li>
                            <li><i class="fa fa-times text-danger"></i> <strong class="text-danger">Belum Terverifikasi</strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putra : <strong> <?= $md3['lb']  ?> Santri</strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putri : <strong> <?= $md3['pb'] ?> Santri</strong></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- MA Data -->
                  <div class="col-md-3 col-sm-6 ">
                    <div class="pricing">
                      <div class="title">
                        <?php
                        $mk1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 4 AND jkl = 'Laki-laki') AS ml,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 4 AND jkl = 'Perempuan') AS mp,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 4 AND gel = 1 AND jkl = 'Laki-laki' AND stts = 'Terverifikasi') AS lv,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 4 AND gel = 1 AND jkl = 'Laki-laki' AND stts = 'Belum Terverifikasi') AS lb,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 4 AND gel = 1 AND jkl = 'Perempuan' AND stts = 'Terverifikasi') AS pv,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 4 AND gel = 1 AND jkl = 'Perempuan' AND stts = 'Belum Terverifikasi') AS pb
                            FROM tb_santri GROUP BY gel LIMIT 1"));
                        ?>
                        <h2>Data SMK</h2>
                        <h1><?= $smk ?> Santri</h1>
                        <span>Putra : <?= $mk1['ml'] ?> | Putri : <?= $mk1['mp'] ?></span>
                      </div>
                      <div class="x_content">
                        <div class="pricing_features">
                          <ul class="list-unstyled text-left">
                            <span class="label label-info">GELOMBANG 1</span> : <?= $mk1['lv'] + $mk1['lb'] + $mk1['pv'] + $mk1['pb'] ?> santri
                            <li><i class="fa fa-check text-success"></i> <strong class="text-success">Terverifikasi </strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putra : <strong> <?= $mk1['lv'] ?> Santri</strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putri : <strong> <?= $mk1['pv']  ?> Santri</strong></li>
                            <li><i class="fa fa-times text-danger"></i> <strong class="text-danger">Belum Terverifikasi</strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putra : <strong> <?= $mk1['lb']  ?> Santri</strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putri : <strong> <?= $mk1['pb'] ?> Santri</strong></li>
                          </ul>
                          <hr>
                          <ul class="list-unstyled text-left">
                            <?php
                            $mk2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT 
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 4 AND gel = 2 AND jkl = 'Laki-laki' AND stts = 'Terverifikasi') AS lv,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 4 AND gel = 2 AND jkl = 'Laki-laki' AND stts = 'Belum Terverifikasi') AS lb,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 4 AND gel = 2 AND jkl = 'Perempuan' AND stts = 'Terverifikasi') AS pv,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 4 AND gel = 2 AND jkl = 'Perempuan' AND stts = 'Belum Terverifikasi') AS pb
                            FROM tb_santri GROUP BY gel LIMIT 1"));
                            ?>
                            <span class="label label-warning">GELOMBANG 2</span> : <?= $mk2['lv'] + $mk2['lb'] + $mk2['pv'] + $mk2['pb'] ?> santri
                            <li><i class="fa fa-check text-success"></i> <strong class="text-success">Terverifikasi </strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putra : <strong> <?= $mk2['lv'] ?> Santri</strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putri : <strong> <?= $mk2['pv']  ?> Santri</strong></li>
                            <li><i class="fa fa-times text-danger"></i> <strong class="text-danger">Belum Terverifikasi</strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putra : <strong> <?= $mk2['lb']  ?> Santri</strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putri : <strong> <?= $mk2['pb'] ?> Santri</strong></li>
                          </ul>
                          <hr>
                          <ul class="list-unstyled text-left">
                            <?php
                            $mk3 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 4 AND jkl = 'Laki-laki') AS ml,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 4 AND jkl = 'Perempuan') AS mp,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 4 AND gel = 3 AND jkl = 'Laki-laki' AND stts = 'Terverifikasi') AS lv,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 4 AND gel = 3 AND jkl = 'Laki-laki' AND stts = 'Belum Terverifikasi') AS lb,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 4 AND gel = 3 AND jkl = 'Perempuan' AND stts = 'Terverifikasi') AS pv,
                            (SELECT COUNT(*) FROM tb_santri WHERE lembaga = 4 AND gel = 3 AND jkl = 'Perempuan' AND stts = 'Belum Terverifikasi') AS pb
                            FROM tb_santri GROUP BY gel LIMIT 1"));
                            ?>
                            <span class="label label-danger">GELOMBANG 3</span> : <?= $mk3['lv'] + $mk3['lb'] + $mk3['pv'] + $mk3['pb'] ?> santri
                            <li><i class="fa fa-check text-success"></i> <strong class="text-success">Terverifikasi </strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putra : <strong> <?= $mk3['lv'] ?> Santri</strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putri : <strong> <?= $mk3['pv']  ?> Santri</strong></li>
                            <li><i class="fa fa-times text-danger"></i> <strong class="text-danger">Belum Terverifikasi</strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putra : <strong> <?= $mk3['lb']  ?> Santri</strong></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Putri : <strong> <?= $mk3['pb'] ?> Santri</strong></li>
                          </ul>
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
  <!-- bootstrap-daterangepicker -->
  <script src="vendors/moment/min/moment.min.js"></script>
  <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="build/js/custom.min.js"></script>
</body>

</html>