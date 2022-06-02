<?php

require '../function.php';


$nis = $_GET['nis'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_santri WHERE nis = '$nis' "));
$data2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT tb_santri.id, tb_santri.nis, tb_santri.nama, tb_santri.lembaga, tb_santri.stts, tb_santri.jkl, 
provinsi.nama AS pr, kabupaten.nama AS kb, kecamatan.nama AS kc, kelurahan.nama AS kl FROM `tb_santri` 
JOIN kelurahan ON kelurahan.id_kel=tb_santri.desa
JOIN kecamatan ON kecamatan.id_kec=tb_santri.kec
JOIN kabupaten ON kabupaten.id_kab=tb_santri.kab
JOIN provinsi ON provinsi.id_prov=tb_santri.prov
ORDER BY tb_santri.id ASC"));

$bl = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
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
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Foto Profile</h3>
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
                                    <h2>Foto Santri <small>untuk menambah foto santri </small></h2>
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
                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                        <div class="profile_title">
                                            <div class="col-md-12">
                                                <h2>Form Foto Santri</h2>
                                            </div>
                                        </div>
                                        <br>
                                        <!-- start user projects -->
                                        <form method="post" action="<?= 'edit_f.php?nis=' . $data['nis'] ?>">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div id="my_camera"></div>
                                                    <br />
                                                    <input type="button" class="btn btn-danger" value="Ambil Gambar" onClick="take_snapshot()">
                                                    <input type="hidden" name="image" class="image-tag">
                                                </div>
                                                <div class="col-md-6">
                                                    <div id="results">Hasil jepretan akan muncul disini...</div>
                                                </div>
                                                <div class="col-md-12 text-center">
                                                    <br />
                                                    <button class="btn btn-success"><span class="fa fa-save"></span> Simpan</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- end user projects -->
                                    </div>
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <div class="profile_title">
                                            <div class="col-md-12">
                                                <h2><?= $data['nama'] ?></h2>
                                            </div>
                                        </div>
                                        <br>
                                        <!-- start user projects -->
                                        <table class="data table table-striped no-margin">
                                            <thead>
                                                <tr>
                                                    <th>No. Daftar</th>
                                                    <th>
                                                        <?= $data['nis'] ?>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Tetala</td>
                                                    <td><?= $data['tempat'] . ', ' . tgl($data['tanggal']) ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Jenkel</td>
                                                    <td><?= $data['jkl'] ?></td>
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
                                                    <td><?= $data2['kl'] . ' - ' . $data2['kc'] . ' - ' . $data2['kb']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Foto</td>
                                                    <td><img src="<?= 'foto_santri/' . $data['foto']; ?>" height="150" alt=""></td>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" /> -->
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- morris.js -->
    <script src="../vendors/raphael/raphael.min.js"></script>
    <script src="../vendors/morris.js/morris.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <script language="JavaScript">
        Webcam.set({
            // live preview size
            width: 300,
            height: 230,

            // device capture size
            dest_width: 300,
            dest_height: 230,

            // final cropped size
            crop_width: 184,
            crop_height: 230,

            // format and quality
            image_format: 'jpeg',
            jpeg_quality: 100
        });

        Webcam.attach('#my_camera');

        function take_snapshot() {
            Webcam.snap(function(data_uri) {
                $(".image-tag").val(data_uri);
                document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
            });
        }
    </script>
</body>

</html>