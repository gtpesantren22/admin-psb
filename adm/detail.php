<?php

require 'function.php';


$nis = $_GET['nis'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_santri WHERE nis = '$nis' "));
// $data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT tb_santri.id, tb_santri.nis, tb_santri.nama, tb_santri.lembaga, tb_santri.stts, tb_santri.jkl,  tb_santri.foto, 
// provinsi.nama AS pr, kabupaten.nama AS kb, kecamatan.nama AS kc, kelurahan.nama AS kl FROM `tb_santri` 
// JOIN kelurahan ON kelurahan.id_kel=tb_santri.desa
// JOIN kecamatan ON kecamatan.id_kec=tb_santri.kec
// JOIN kabupaten ON kabupaten.id_kab=tb_santri.kab
// JOIN provinsi ON provinsi.id_prov=tb_santri.prov
// WHERE nis = '$nis' "));

$bl = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

if ($data['foto'] == '') {
    $ft = 'img/Avatar.png';
} else {
    $ft = 'foto_santri/' . $data['foto'];
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
                            <h3>User Profile</h3>
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
                                    <h2>Detail Santri <small>untuk melihat data santri secara detail</small></h2>
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
                                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                                        <div class="profile_img">
                                            <div id="crop-avatar">
                                                <!-- Current avatar -->
                                                <img class="img-responsive avatar-view" src="<?= $ft; ?>" alt="Avatar" width="100" title="Change the avatar" class="shadow">
                                            </div>
                                        </div>
                                        <h3><?= $data['nis'] ?></h3>

                                        <ul class="list-unstyled user_data">
                                            <li><i class="fa fa-map-marker user-profile-icon"></i> Kamar :
                                            </li>

                                            <li>
                                                <i class="fa fa-briefcase user-profile-icon"></i> Tmp Kos :
                                            </li>
                                        </ul>

                                        <a href="<?= 'edit.php?nis=' . $nis; ?>" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                                        <br />
                                    </div>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <div class="profile_title">
                                            <div class="col-md-6">
                                                <h2><?= $data['nama'] ?></h2>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                                                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                    <span><?= $data['waktu_daftar'] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <!-- start user projects -->
                                        <table class="data table table-striped no-margin">
                                            <thead>
                                                <tr>
                                                    <th>No. NIK</th>
                                                    <th>
                                                        <?= $data['nik'] ?>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>No. KK</td>
                                                    <td><?= $data['no_kk'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Tetala</td>
                                                    <td><?= $data['tempat'] . ', ' . tgl($data['tanggal']) ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Jenkel</td>
                                                    <td><?= $data['jkl'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Anak ke-</td>
                                                    <td><?= $data['anak_ke'] . ' dari  ' . $data['jml_sdr'] . ' bersaudara' ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Lembaga</td>
                                                    <td><?php
                                                        $le = array("", "MTs", "SMP", "MA", "SMK");
                                                        $jl = array("", "Reguler", "Prestasi");
                                                        echo "<span class='badge bg-red'>" . $le[$data['lembaga']] . "</span>";
                                                        echo "<span class='badge bg-blue'>" . $jl[$data['jalur']] . "</span>";
                                                        echo "<span class='badge bg-orange'> Gelombang " . $data['gel'] . "</span>";
                                                        //echo $le[$l];
                                                        ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Alamat</td>
                                                    <td><?= $data['desa'] . ' - ' . $data['kec'] . ' - ' . $data['kab'] . ', ' . $data['prov'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Sekolah Asal</td>
                                                    <td><?= $data['asal'] . ' - ' . $data['a_asal'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Nama Bapak</td>
                                                    <td><?= $data['bapak'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Pekerjaan Bapak</td>
                                                    <td><?= $data['a_pkj'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Nama Ibu</td>
                                                    <td><?= $data['ibu'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Pekerjaan Ibu</td>
                                                    <td><?= $data['i_pkj'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td>No. HP</td>
                                                    <td><?= $data['hp'] ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <!-- end user projects -->
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

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

</body>

</html>