<?php

require 'function.php';

$data = query("SELECT tb_santri.*,  
lemari.komplek, lemari.kamar, lemari.no FROM `tb_santri` 

JOIN lemari ON lemari.nis=tb_santri.nis ORDER BY tb_santri.id_santri ASC");

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
            <?php include 'nav.php'; ?>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="row">

                        <!-- Jati -->
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2><i class="fa fa-bars"></i> Komplek : Sunan Gunung Jati <small>Data
                                            Lemari</small>
                                    </h2>
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
                                            <a class="nav-link " id="j1-tab" data-toggle="tab" href="#j1" role="tab" aria-controls="j1" aria-selected="true">Jati 1</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="j2-tab" data-toggle="tab" href="#j2" role="tab" aria-controls="j2" aria-selected="false">Jati 2</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="j3-tab" data-toggle="tab" href="#j3" role="tab" aria-controls="j3" aria-selected="false">Jati 3</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="j4-tab" data-toggle="tab" href="#j4" role="tab" aria-controls="j4" aria-selected="false">Jati 4</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">

                                        <div class="tab-pane fade " id="j1" role="tabpanel" aria-labelledby="j1-tab">
                                            <div class="row">

                                                <!-- Lemari 1 -->
                                                <div class="col-md-3">
                                                    <h2> Lemari 1 </h2>
                                                    <article class="media event">
                                                        <?php
                                                        $sq = mysqli_query($conn, "SELECT * FROM lemari_data WHERE komplek = 'Sunan Gunung Jati' AND kamar = 'Jati 1' AND lemari = 'L1' ");
                                                        while ($lm = mysqli_fetch_assoc($sq)) {
                                                        ?>
                                                            <?php if ($lm['nis'] != '') { ?>
                                                                <a class="pull-left date" href="#myModal" id="custId" data-toggle="modal" data-id="<?= $lm['id']; ?>" title="Klik untuk mengetahui pemiliknya">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-check"></span></p>
                                                                </a>
                                                            <?php } else { ?>
                                                                <a class="pull-left date">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-times"></span></p>
                                                                </a>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </article>
                                                </div>

                                                <!-- Lemari 2 -->
                                                <div class="col-md-3">
                                                    <h2> Lemari 2 </h2>
                                                    <article class="media event">
                                                        <?php
                                                        $sq = mysqli_query($conn, "SELECT * FROM lemari_data WHERE komplek = 'Sunan Gunung Jati' AND kamar = 'Jati 1' AND lemari = 'L2' ");
                                                        while ($lm = mysqli_fetch_assoc($sq)) {
                                                        ?>
                                                            <?php if ($lm['nis'] != '') { ?>
                                                                <a class="pull-left date" href="#myModal" id="custId" data-toggle="modal" data-id="<?= $lm['id']; ?>" title="Klik untuk mengetahui pemiliknya">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-check"></span></p>
                                                                </a>
                                                            <?php } else { ?>
                                                                <a class="pull-left date">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-times"></span></p>
                                                                </a>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </article>
                                                </div>

                                                <!-- Lemari 3 -->
                                                <div class="col-md-3">
                                                    <h2> Lemari 3 </h2>
                                                    <article class="media event">
                                                        <?php
                                                        $sq = mysqli_query($conn, "SELECT * FROM lemari_data WHERE komplek = 'Sunan Gunung Jati' AND kamar = 'Jati 1' AND lemari = 'L3' ");
                                                        while ($lm = mysqli_fetch_assoc($sq)) {
                                                        ?>
                                                            <?php if ($lm['nis'] != '') { ?>
                                                                <a class="pull-left date" href="#myModal" id="custId" data-toggle="modal" data-id="<?= $lm['id']; ?>" title="Klik untuk mengetahui pemiliknya">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-check"></span></p>
                                                                </a>
                                                            <?php } else { ?>
                                                                <a class="pull-left date">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-times"></span></p>
                                                                </a>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </article>
                                                </div>

                                                <!-- Lemari 4 -->
                                                <div class="col-md-3">
                                                    <h2> Lemari 4 </h2>
                                                    <article class="media event">
                                                        <?php
                                                        $sq = mysqli_query($conn, "SELECT * FROM lemari_data WHERE komplek = 'Sunan Gunung Jati' AND kamar = 'Jati 1' AND lemari = 'L4' ");
                                                        while ($lm = mysqli_fetch_assoc($sq)) {
                                                        ?>
                                                            <?php if ($lm['nis'] != '') { ?>
                                                                <a class="pull-left date" href="#myModal" id="custId" data-toggle="modal" data-id="<?= $lm['id']; ?>" title="Klik untuk mengetahui pemiliknya">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-check"></span></p>
                                                                </a>
                                                            <?php } else { ?>
                                                                <a class="pull-left date">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-times"></span></p>
                                                                </a>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </article>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="tab-pane fade " id="j2" role="tabpanel" aria-labelledby="j2-tab">
                                            <div class="row">

                                                <!-- Lemari 1 -->
                                                <div class="col-md-3">
                                                    <h2> Lemari 1 </h2>
                                                    <article class="media event">
                                                        <?php
                                                        $sq = mysqli_query($conn, "SELECT * FROM lemari_data WHERE komplek = 'Sunan Gunung Jati' AND kamar = 'Jati 2' AND lemari = 'L1' ");
                                                        while ($lm = mysqli_fetch_assoc($sq)) {
                                                        ?>
                                                            <?php if ($lm['nis'] != '') { ?>
                                                                <a class="pull-left date" href="#myModal" id="custId" data-toggle="modal" data-id="<?= $lm['id']; ?>" title="Klik untuk mengetahui pemiliknya">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-check"></span></p>
                                                                </a>
                                                            <?php } else { ?>
                                                                <a class="pull-left date">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-times"></span></p>
                                                                </a>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </article>
                                                </div>

                                                <!-- Lemari 2 -->
                                                <div class="col-md-3">
                                                    <h2> Lemari 2 </h2>
                                                    <article class="media event">
                                                        <?php
                                                        $sq = mysqli_query($conn, "SELECT * FROM lemari_data WHERE komplek = 'Sunan Gunung Jati' AND kamar = 'Jati 2' AND lemari = 'L2' ");
                                                        while ($lm = mysqli_fetch_assoc($sq)) {
                                                        ?>
                                                            <?php if ($lm['nis'] != '') { ?>
                                                                <a class="pull-left date" href="#myModal" id="custId" data-toggle="modal" data-id="<?= $lm['id']; ?>" title="Klik untuk mengetahui pemiliknya">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-check"></span></p>
                                                                </a>
                                                            <?php } else { ?>
                                                                <a class="pull-left date">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-times"></span></p>
                                                                </a>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </article>
                                                </div>

                                                <!-- Lemari 3 -->
                                                <div class="col-md-3">
                                                    <h2> Lemari 3 </h2>
                                                    <article class="media event">
                                                        <?php
                                                        $sq = mysqli_query($conn, "SELECT * FROM lemari_data WHERE komplek = 'Sunan Gunung Jati' AND kamar = 'Jati 2' AND lemari = 'L3' ");
                                                        while ($lm = mysqli_fetch_assoc($sq)) {
                                                        ?>
                                                            <?php if ($lm['nis'] != '') { ?>
                                                                <a class="pull-left date" href="#myModal" id="custId" data-toggle="modal" data-id="<?= $lm['id']; ?>" title="Klik untuk mengetahui pemiliknya">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-check"></span></p>
                                                                </a>
                                                            <?php } else { ?>
                                                                <a class="pull-left date">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-times"></span></p>
                                                                </a>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </article>
                                                </div>

                                                <!-- Lemari 4 -->
                                                <div class="col-md-3">
                                                    <h2> Lemari 4 </h2>
                                                    <article class="media event">
                                                        <?php
                                                        $sq = mysqli_query($conn, "SELECT * FROM lemari_data WHERE komplek = 'Sunan Gunung Jati' AND kamar = 'Jati 2' AND lemari = 'L4' ");
                                                        while ($lm = mysqli_fetch_assoc($sq)) {
                                                        ?>
                                                            <?php if ($lm['nis'] != '') { ?>
                                                                <a class="pull-left date" href="#myModal" id="custId" data-toggle="modal" data-id="<?= $lm['id']; ?>" title="Klik untuk mengetahui pemiliknya">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-check"></span></p>
                                                                </a>
                                                            <?php } else { ?>
                                                                <a class="pull-left date">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-times"></span></p>
                                                                </a>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </article>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="tab-pane fade " id="j3" role="tabpanel" aria-labelledby="j3-tab">
                                            <div class="row">

                                                <!-- Lemari 1 -->
                                                <div class="col-md-3">
                                                    <h2> Lemari 1 </h2>
                                                    <article class="media event">
                                                        <?php
                                                        $sq = mysqli_query($conn, "SELECT * FROM lemari_data WHERE komplek = 'Sunan Gunung Jati' AND kamar = 'Jati 3' AND lemari = 'L1' ");
                                                        while ($lm = mysqli_fetch_assoc($sq)) {
                                                        ?>
                                                            <?php if ($lm['nis'] != '') { ?>
                                                                <a class="pull-left date" href="#myModal" id="custId" data-toggle="modal" data-id="<?= $lm['id']; ?>" title="Klik untuk mengetahui pemiliknya">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-check"></span></p>
                                                                </a>
                                                            <?php } else { ?>
                                                                <a class="pull-left date">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-times"></span></p>
                                                                </a>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </article>
                                                </div>

                                                <!-- Lemari 2 -->
                                                <div class="col-md-3">
                                                    <h2> Lemari 2 </h2>
                                                    <article class="media event">
                                                        <?php
                                                        $sq = mysqli_query($conn, "SELECT * FROM lemari_data WHERE komplek = 'Sunan Gunung Jati' AND kamar = 'Jati 3' AND lemari = 'L2' ");
                                                        while ($lm = mysqli_fetch_assoc($sq)) {
                                                        ?>
                                                            <?php if ($lm['nis'] != '') { ?>
                                                                <a class="pull-left date" href="#myModal" id="custId" data-toggle="modal" data-id="<?= $lm['id']; ?>" title="Klik untuk mengetahui pemiliknya">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-check"></span></p>
                                                                </a>
                                                            <?php } else { ?>
                                                                <a class="pull-left date">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-times"></span></p>
                                                                </a>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </article>
                                                </div>

                                                <!-- Lemari 3 -->
                                                <div class="col-md-3">
                                                    <h2> Lemari 3 </h2>
                                                    <article class="media event">
                                                        <?php
                                                        $sq = mysqli_query($conn, "SELECT * FROM lemari_data WHERE komplek = 'Sunan Gunung Jati' AND kamar = 'Jati 3' AND lemari = 'L3' ");
                                                        while ($lm = mysqli_fetch_assoc($sq)) {
                                                        ?>
                                                            <?php if ($lm['nis'] != '') { ?>
                                                                <a class="pull-left date" href="#myModal" id="custId" data-toggle="modal" data-id="<?= $lm['id']; ?>" title="Klik untuk mengetahui pemiliknya">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-check"></span></p>
                                                                </a>
                                                            <?php } else { ?>
                                                                <a class="pull-left date">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-times"></span></p>
                                                                </a>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </article>
                                                </div>

                                                <!-- Lemari 4 -->
                                                <div class="col-md-3">
                                                    <h2> Lemari 4 </h2>
                                                    <article class="media event">
                                                        <?php
                                                        $sq = mysqli_query($conn, "SELECT * FROM lemari_data WHERE komplek = 'Sunan Gunung Jati' AND kamar = 'Jati 3' AND lemari = 'L4' ");
                                                        while ($lm = mysqli_fetch_assoc($sq)) {
                                                        ?>
                                                            <?php if ($lm['nis'] != '') { ?>
                                                                <a class="pull-left date" href="#myModal" id="custId" data-toggle="modal" data-id="<?= $lm['id']; ?>" title="Klik untuk mengetahui pemiliknya">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-check"></span></p>
                                                                </a>
                                                            <?php } else { ?>
                                                                <a class="pull-left date">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-times"></span></p>
                                                                </a>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </article>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="tab-pane fade " id="j4" role="tabpanel" aria-labelledby="j4-tab">
                                            <div class="row">

                                                <!-- Lemari 1 -->
                                                <div class="col-md-3">
                                                    <h2> Lemari 1 </h2>
                                                    <article class="media event">
                                                        <?php
                                                        $sq = mysqli_query($conn, "SELECT * FROM lemari_data WHERE komplek = 'Sunan Gunung Jati' AND kamar = 'Jati 4' AND lemari = 'L1' ");
                                                        while ($lm = mysqli_fetch_assoc($sq)) {
                                                        ?>
                                                            <?php if ($lm['nis'] != '') { ?>
                                                                <a class="pull-left date" href="#myModal" id="custId" data-toggle="modal" data-id="<?= $lm['id']; ?>" title="Klik untuk mengetahui pemiliknya">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-check"></span></p>
                                                                </a>
                                                            <?php } else { ?>
                                                                <a class="pull-left date">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-times"></span></p>
                                                                </a>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </article>
                                                </div>

                                                <!-- Lemari 2 -->
                                                <div class="col-md-3">
                                                    <h2> Lemari 2 </h2>
                                                    <article class="media event">
                                                        <?php
                                                        $sq = mysqli_query($conn, "SELECT * FROM lemari_data WHERE komplek = 'Sunan Gunung Jati' AND kamar = 'Jati 4' AND lemari = 'L2' ");
                                                        while ($lm = mysqli_fetch_assoc($sq)) {
                                                        ?>
                                                            <?php if ($lm['nis'] != '') { ?>
                                                                <a class="pull-left date" href="#myModal" id="custId" data-toggle="modal" data-id="<?= $lm['id']; ?>" title="Klik untuk mengetahui pemiliknya">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-check"></span></p>
                                                                </a>
                                                            <?php } else { ?>
                                                                <a class="pull-left date">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-times"></span></p>
                                                                </a>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </article>
                                                </div>

                                                <!-- Lemari 3 -->
                                                <div class="col-md-3">
                                                    <h2> Lemari 3 </h2>
                                                    <article class="media event">
                                                        <?php
                                                        $sq = mysqli_query($conn, "SELECT * FROM lemari_data WHERE komplek = 'Sunan Gunung Jati' AND kamar = 'Jati 4' AND lemari = 'L3' ");
                                                        while ($lm = mysqli_fetch_assoc($sq)) {
                                                        ?>
                                                            <?php if ($lm['nis'] != '') { ?>
                                                                <a class="pull-left date" href="#myModal" id="custId" data-toggle="modal" data-id="<?= $lm['id']; ?>" title="Klik untuk mengetahui pemiliknya">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-check"></span></p>
                                                                </a>
                                                            <?php } else { ?>
                                                                <a class="pull-left date">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-times"></span></p>
                                                                </a>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </article>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bonang -->
                        <div class="col-md-12 col-sm-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2><i class="fa fa-bars"></i> Komplek : Sunan Bonang <small>Data Lemari</small>
                                    </h2>
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
                                            <a class="nav-link " id="b1-tab" data-toggle="tab" href="#b1" role="tab" aria-controls="b1" aria-selected="true">Bonang 1</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="b2-tab" data-toggle="tab" href="#b2" role="tab" aria-controls="b2" aria-selected="false">Bonang 2</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="b3-tab" data-toggle="tab" href="#b3" role="tab" aria-controls="b3" aria-selected="false">Bonang 3</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="b4-tab" data-toggle="tab" href="#b4" role="tab" aria-controls="b4" aria-selected="false">Bonang 4</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade " id="b1" role="tabpanel" aria-labelledby="b1-tab">
                                            <div class="row">

                                                <!-- Lemari 1 -->
                                                <div class="col-md-3">
                                                    <h2> Lemari 1 </h2>
                                                    <article class="media event">
                                                        <?php
                                                        $sq = mysqli_query($conn, "SELECT * FROM lemari_data WHERE komplek = 'Sunan Bonang' AND kamar = 'Bonang 1' AND lemari = 'L1' ");
                                                        while ($lm = mysqli_fetch_assoc($sq)) {
                                                        ?>
                                                            <?php if ($lm['nis'] != '') { ?>
                                                                <a class="pull-left date" href="#myModal" id="custId" data-toggle="modal" data-id="<?= $lm['id']; ?>" title="Klik untuk mengetahui pemiliknya">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-check"></span></p>
                                                                </a>
                                                            <?php } else { ?>
                                                                <a class="pull-left date">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-times"></span></p>
                                                                </a>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </article>
                                                </div>

                                                <!-- Lemari 2 -->
                                                <div class="col-md-3">
                                                    <h2> Lemari 2 </h2>
                                                    <article class="media event">
                                                        <?php
                                                        $sq = mysqli_query($conn, "SELECT * FROM lemari_data WHERE komplek = 'Sunan Bonang' AND kamar = 'Bonang 1' AND lemari = 'L2' ");
                                                        while ($lm = mysqli_fetch_assoc($sq)) {
                                                        ?>
                                                            <?php if ($lm['nis'] != '') { ?>
                                                                <a class="pull-left date" href="#myModal" id="custId" data-toggle="modal" data-id="<?= $lm['id']; ?>" title="Klik untuk mengetahui pemiliknya">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-check"></span></p>
                                                                </a>
                                                            <?php } else { ?>
                                                                <a class="pull-left date">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-times"></span></p>
                                                                </a>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </article>
                                                </div>

                                                <!-- Lemari 3 -->
                                                <div class="col-md-3">
                                                    <h2> Lemari 3 </h2>
                                                    <article class="media event">
                                                        <?php
                                                        $sq = mysqli_query($conn, "SELECT * FROM lemari_data WHERE komplek = 'Sunan Bonang' AND kamar = 'Bonang 1' AND lemari = 'L3' ");
                                                        while ($lm = mysqli_fetch_assoc($sq)) {
                                                        ?>
                                                            <?php if ($lm['nis'] != '') { ?>
                                                                <a class="pull-left date" href="#myModal" id="custId" data-toggle="modal" data-id="<?= $lm['id']; ?>" title="Klik untuk mengetahui pemiliknya">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-check"></span></p>
                                                                </a>
                                                            <?php } else { ?>
                                                                <a class="pull-left date">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-times"></span></p>
                                                                </a>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </article>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="tab-pane fade " id="b2" role="tabpanel" aria-labelledby="b2-tab">
                                            <div class="row">

                                                <!-- Lemari 1 -->
                                                <div class="col-md-4">
                                                    <h2> Lemari 1 </h2>
                                                    <article class="media event">
                                                        <?php
                                                        $sq = mysqli_query($conn, "SELECT * FROM lemari_data WHERE komplek = 'Sunan Bonang' AND kamar = 'Bonang 2' AND lemari = 'L1' ");
                                                        while ($lm = mysqli_fetch_assoc($sq)) {
                                                        ?>
                                                            <?php if ($lm['nis'] != '') { ?>
                                                                <a class="pull-left date" href="#myModal" id="custId" data-toggle="modal" data-id="<?= $lm['id']; ?>" title="Klik untuk mengetahui pemiliknya">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-check"></span></p>
                                                                </a>
                                                            <?php } else { ?>
                                                                <a class="pull-left date">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-times"></span></p>
                                                                </a>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </article>
                                                </div>

                                                <!-- Lemari 2 -->
                                                <div class="col-md-3">
                                                    <h2> Lemari 2 </h2>
                                                    <article class="media event">
                                                        <?php
                                                        $sq = mysqli_query($conn, "SELECT * FROM lemari_data WHERE komplek = 'Sunan Bonang' AND kamar = 'Bonang 2' AND lemari = 'L2' ");
                                                        while ($lm = mysqli_fetch_assoc($sq)) {
                                                        ?>
                                                            <?php if ($lm['nis'] != '') { ?>
                                                                <a class="pull-left date" href="#myModal" id="custId" data-toggle="modal" data-id="<?= $lm['id']; ?>" title="Klik untuk mengetahui pemiliknya">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-check"></span></p>
                                                                </a>
                                                            <?php } else { ?>
                                                                <a class="pull-left date">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-times"></span></p>
                                                                </a>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </article>
                                                </div>

                                                <!-- Lemari 3 -->
                                                <div class="col-md-4">
                                                    <h2> Lemari 3 </h2>
                                                    <article class="media event">
                                                        <?php
                                                        $sq = mysqli_query($conn, "SELECT * FROM lemari_data WHERE komplek = 'Sunan Bonang' AND kamar = 'Bonang 2' AND lemari = 'L3' ");
                                                        while ($lm = mysqli_fetch_assoc($sq)) {
                                                        ?>
                                                            <?php if ($lm['nis'] != '') { ?>
                                                                <a class="pull-left date" href="#myModal" id="custId" data-toggle="modal" data-id="<?= $lm['id']; ?>" title="Klik untuk mengetahui pemiliknya">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-check"></span></p>
                                                                </a>
                                                            <?php } else { ?>
                                                                <a class="pull-left date">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-times"></span></p>
                                                                </a>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </article>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="tab-pane fade " id="b3" role="tabpanel" aria-labelledby="b3-tab">
                                            <div class="row">

                                                <!-- Lemari 1 -->
                                                <div class="col-md-3">
                                                    <h2> Lemari 1 </h2>
                                                    <article class="media event">
                                                        <?php
                                                        $sq = mysqli_query($conn, "SELECT * FROM lemari_data WHERE komplek = 'Sunan Bonang' AND kamar = 'Bonang 3' AND lemari = 'L1' ");
                                                        while ($lm = mysqli_fetch_assoc($sq)) {
                                                        ?>
                                                            <?php if ($lm['nis'] != '') { ?>
                                                                <a class="pull-left date" href="#myModal" id="custId" data-toggle="modal" data-id="<?= $lm['id']; ?>" title="Klik untuk mengetahui pemiliknya">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-check"></span></p>
                                                                </a>
                                                            <?php } else { ?>
                                                                <a class="pull-left date">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-times"></span></p>
                                                                </a>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </article>
                                                </div>

                                                <!-- Lemari 2 -->
                                                <div class="col-md-3">
                                                    <h2> Lemari 2 </h2>
                                                    <article class="media event">
                                                        <?php
                                                        $sq = mysqli_query($conn, "SELECT * FROM lemari_data WHERE komplek = 'Sunan Bonang' AND kamar = 'Bonang 3' AND lemari = 'L2' ");
                                                        while ($lm = mysqli_fetch_assoc($sq)) {
                                                        ?>
                                                            <?php if ($lm['nis'] != '') { ?>
                                                                <a class="pull-left date" href="#myModal" id="custId" data-toggle="modal" data-id="<?= $lm['id']; ?>" title="Klik untuk mengetahui pemiliknya">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-check"></span></p>
                                                                </a>
                                                            <?php } else { ?>
                                                                <a class="pull-left date">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-times"></span></p>
                                                                </a>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </article>
                                                </div>

                                                <!-- Lemari 3 -->
                                                <div class="col-md-3">
                                                    <h2> Lemari 3 </h2>
                                                    <article class="media event">
                                                        <?php
                                                        $sq = mysqli_query($conn, "SELECT * FROM lemari_data WHERE komplek = 'Sunan Bonang' AND kamar = 'Bonang 3' AND lemari = 'L3' ");
                                                        while ($lm = mysqli_fetch_assoc($sq)) {
                                                        ?>
                                                            <?php if ($lm['nis'] != '') { ?>
                                                                <a class="pull-left date" href="#myModal" id="custId" data-toggle="modal" data-id="<?= $lm['id']; ?>" title="Klik untuk mengetahui pemiliknya">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-check"></span></p>
                                                                </a>
                                                            <?php } else { ?>
                                                                <a class="pull-left date">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-times"></span></p>
                                                                </a>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </article>
                                                </div>

                                                <!-- Lemari 4 -->
                                                <div class="col-md-3">
                                                    <h2> Lemari 4 </h2>
                                                    <article class="media event">
                                                        <?php
                                                        $sq = mysqli_query($conn, "SELECT * FROM lemari_data WHERE komplek = 'Sunan Bonang' AND kamar = 'Bonang 3' AND lemari = 'L4' ");
                                                        while ($lm = mysqli_fetch_assoc($sq)) {
                                                        ?>
                                                            <?php if ($lm['nis'] != '') { ?>
                                                                <a class="pull-left date" href="#myModal" id="custId" data-toggle="modal" data-id="<?= $lm['id']; ?>" title="Klik untuk mengetahui pemiliknya">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-check"></span></p>
                                                                </a>
                                                            <?php } else { ?>
                                                                <a class="pull-left date">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-times"></span></p>
                                                                </a>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </article>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="tab-pane fade " id="b4" role="tabpanel" aria-labelledby="b4-tab">
                                            <div class="row">

                                                <!-- Lemari 1 -->
                                                <div class="col-md-3">
                                                    <h2> Lemari 1 </h2>
                                                    <article class="media event">
                                                        <?php
                                                        $sq = mysqli_query($conn, "SELECT * FROM lemari_data WHERE komplek = 'Sunan Bonang' AND kamar = 'Bonang 4' AND lemari = 'L1' ");
                                                        while ($lm = mysqli_fetch_assoc($sq)) {
                                                        ?>
                                                            <?php if ($lm['nis'] != '') { ?>
                                                                <a class="pull-left date" href="#myModal" id="custId" data-toggle="modal" data-id="<?= $lm['id']; ?>" title="Klik untuk mengetahui pemiliknya">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-check"></span></p>
                                                                </a>
                                                            <?php } else { ?>
                                                                <a class="pull-left date">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-times"></span></p>
                                                                </a>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </article>
                                                </div>

                                                <!-- Lemari 2 -->
                                                <div class="col-md-3">
                                                    <h2> Lemari 2 </h2>
                                                    <article class="media event">
                                                        <?php
                                                        $sq = mysqli_query($conn, "SELECT * FROM lemari_data WHERE komplek = 'Sunan Bonang' AND kamar = 'Bonang 4' AND lemari = 'L2' ");
                                                        while ($lm = mysqli_fetch_assoc($sq)) {
                                                        ?>
                                                            <?php if ($lm['nis'] != '') { ?>
                                                                <a class="pull-left date" href="#myModal" id="custId" data-toggle="modal" data-id="<?= $lm['id']; ?>" title="Klik untuk mengetahui pemiliknya">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-check"></span></p>
                                                                </a>
                                                            <?php } else { ?>
                                                                <a class="pull-left date">
                                                                    <p class="month"><?= $lm['loker'] ?></p>
                                                                    <p class="day"><span class="fa fa-times"></span></p>
                                                                </a>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </article>
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

    <!-- Modal Detail -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Detail Pengguna Lemari</h4>
                </div>
                <div class="modal-body">
                    <div class="fetched-data"></div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#myModal').on('show.bs.modal', function(e) {
                var rowid = $(e.relatedTarget).data('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type: 'post',
                    url: 'dt_km.php',
                    data: 'rowid=' + rowid,
                    success: function(data) {
                        $('.fetched-data').html(data); //menampilkan data ke dalam modal
                    }
                });
            });
        });
    </script>

</body>

</html>