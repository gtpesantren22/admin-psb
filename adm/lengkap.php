<?php
require 'function.php';

$nis = $_GET['nis'];

$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT *  FROM tb_santri WHERE nis = '$nis' "));
$data2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT *  FROM berkas WHERE nis = '$nis' "));

$almt = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_santri 
WHERE nis  = '$nis' "));

$l = array("", "MTs", "SMP", "MA", "SMK");
$jl = array("", "Reguler", "Prestasi");

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
                        <div class="col-md-12 col-sm-12  ">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Form untuk melengkapi berkas santri <small>santri baru</small></h2>
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

                                    <ul class="messages">
                                        <li>
                                            <img src="img/user.png" class="avatar" alt="Avatar">
                                            <div class="message_date">
                                                <p class="month">Tgl daftar : <?= $data['waktu_daftar'] ?></p>
                                            </div>
                                            <div class="message_wrapper">
                                                <h4 class="heading"><?= $data['nama'] ?></h4>
                                                <blockquote class="message"><?= $almt['desa'] . ' - ' . $almt['kec'] . ' - ' . $almt['kab'] . ' - ' . $almt['prov'] ?></blockquote>
                                                <blockquote class="message">Lembaga : <?= $l[$data['lembaga']] ?> DWK</blockquote>
                                                <blockquote class="message"> <span class="badge bg-green">Gelombang <?= $data['gel'] ?></span> -
                                                    <span class="badge bg-blue"><?= $jl[$data['jalur']] ?></span>
                                                </blockquote>
                                                <br />
                                            </div>
                                        </li>
                                    </ul>
                                    <form action="aksi.php?fn=berkas" method="post">
                                        <input type="hidden" name="nis" value="<?= $nis ?>">
                                        <div class="table-responsive">
                                            <table class="table table-striped jambo_table ">
                                                <thead>
                                                    <tr class="headings">
                                                        <th class="column-title">No. </th>
                                                        <th class="column-title">Nama Berkas </th>
                                                        <th class="column-title">Status Pengumpulan </th>
                                                        <th class="column-title" colspan="2">Keterangan </th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr class="even pointer">
                                                        <td>1</td>
                                                        <td>Kartu Keluarga (KK)</td>
                                                        <td class="a-center"><input type="checkbox" value="1" class="flat" name="kk" <?php if ($data2['kk'] == 1) {
                                                                                                                                            echo 'checked';
                                                                                                                                        }  ?>></td>
                                                        <td><input type="number" class="form-control" name="k_kk" value="<?= $data2['k_kk'] ?>"> </i></td>
                                                        <td>/ banyak lembar </i></td>
                                                    </tr>
                                                    <tr class="even pointer">
                                                        <td>2</td>
                                                        <td>Akta Kelahiran</td>
                                                        <td class="a-center"><input type="checkbox" value="1" class="flat" name="akt" <?php if ($data2['akt'] == 1) {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>></td>
                                                        <td><input type="number" class="form-control" name="k_akt" value="<?= $data2['k_akt'] ?>"> </i></td>
                                                        <td>/ banyak lembar </i></td>
                                                    </tr>
                                                    <tr class="even pointer">
                                                        <td>3</td>
                                                        <td>Ijazah</td>
                                                        <td class="a-center"><input type="checkbox" value="1" class="flat" name="ijz" <?php if ($data2['ijz'] == 1) {
                                                                                                                                            echo 'checked';
                                                                                                                                        }  ?>></td>
                                                        <td><input type="number" class="form-control" name="k_ijz" value="<?= $data2['k_ijz'] ?>"> </i></td>
                                                        <td>/ banyak lembar </i></td>
                                                    </tr>
                                                    <?php
                                                    if ($data['jalur'] == 2) {
                                                    ?>
                                                        <tr class="even pointer">
                                                            <td>4</td>
                                                            <td>Sertifikat</td>
                                                            <td class="a-center"><input type="checkbox" value="1" class="flat" name="sfk" <?php if ($data2['sfk'] == 1) {
                                                                                                                                                echo 'checked';
                                                                                                                                            }  ?>></td>
                                                            <td><input type="text" class="form-control" name="k_sfk" value="<?= $data2['k_sfk'] ?>"> </i></td>
                                                            <td>/ disi "Akademik" atau "Non Akademik" </i></td>
                                                        </tr>
                                                        <tr class="even pointer">
                                                            <td>1</td>
                                                            <td>SeKet Prestasi</td>
                                                            <td class="a-center"><input type="checkbox" value="1" class="flat" name="pres" <?php if ($data2['pres'] == 1) {
                                                                                                                                                echo 'checked';
                                                                                                                                            }  ?>></td>
                                                            <td><input type="number" class="form-control" name="k_pres" value="<?= $data2['k_pres'] ?>"> </i></td>
                                                            <td>/ banyak lembar </i></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <button type="submit" name="up" class="btn btn-success pull-right"><i class="fa fa-save"></i> Simpan Perubahan</button>
                                    </form>
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

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

</body>

</html>