<?php

require '../function.php';


$nis = $_GET['nis'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT tb_lama.*, santri.* FROM tb_lama JOIN santri ON tb_lama.nis=santri.nis WHERE tb_lama.nis = '$nis' "));

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
                                    <h2>Edit Santri <small>mengdit santri lama</small></h2>
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
                                <form action="" method="post">
                                    <div class="x_content">
                                        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                                            <div class="profile_img">
                                                <div id="crop-avatar">
                                                    <!-- Current avatar -->
                                                    <img class="img-responsive avatar-view" src="../production/images/picture.jpg" alt="Avatar" title="Change the avatar">
                                                </div>
                                            </div>
                                            <h3><?= $data['nis'] ?></h3>

                                            <button class="btn btn-success" name="update" type="submit"><i class="fa fa-edit m-right-xs"></i> Update Data</button>
                                            <br />
                                        </div>

                                        <div class="col-md-9 col-sm-9 col-xs-12">
                                            <div class="profile_title">
                                                <div class="col-md-6">
                                                    <h2><?= $data['nama'] ?></h2>
                                                    <input type="hidden" name="nis" value="<?= $nis; ?>">
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="pull-right" style="margin-top: 5px; background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #E6E9ED">
                                                        <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                        <span><?= $data['waktu'] ?></span>
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
                                                            <input type="text" name="nik" id="" class="form-control" value="<?= $data['nik'] ?>">
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>Lemabaga</th>
                                                        <th>
                                                            <input type="radio" class="flat" name="tujuan" value="3" <?php if ($data['tujuan'] == '3') echo 'checked' ?> /> MA
                                                            <input type="radio" class="flat" name="tujuan" value="4" <?php if ($data['tujuan'] == '4') echo 'checked' ?> /> SMK
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
                                                    <!-- <tr>
                                                    <td>Lembaga</td>
                                                    <td><?php
                                                        $le = array("", "MTs", "SMP", "MA", "SMK");
                                                        echo "<span class='badge bg-red'>" . $le[$data['tujuan']] . "</span>";
                                                        //echo $le[$l];
                                                        ?></td>
                                                </tr> -->
                                                    <tr>
                                                        <td>Alamat</td>
                                                        <td><?= $data['desa'] . ' - ' . $data['kec'] . ' - ' . $data['kab']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Bapak</td>
                                                        <td><?= $data['bapak'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Ibu</td>
                                                        <td><?= $data['ibu'] ?></td>
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

</body>

</html>

<?php

if (isset($_POST['update'])) {

    $nis = $_POST['nis'];
    $nik = mysqli_real_escape_string($conn, $_POST['nik']);
    $tujuan = $_POST['tujuan'];

    $sql = mysqli_query($conn, "UPDATE tb_lama SET nik = '$nik', tujuan = '$tujuan' WHERE nis = $nis ");

    if ($sql) {
        echo "
        <script>
        window.location.href = edit2.php?nis=" . $nis;
        "</script>";
    } else {
        echo "<script>
        alert('Error Update');
        window.location.href = edit2.php?nis=" . $nis;
        "</script>";
    }
}

?>