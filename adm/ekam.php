<?php
require 'koneksi.php';

$nis = $_GET['nis'];

$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT *  FROM tb_santri WHERE nis = '$nis' "));
$data2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT *  FROM berkas WHERE nis = '$nis' "));
$km = mysqli_fetch_assoc(mysqli_query($conn, "SELECT *  FROM lemari_data WHERE nis = '$nis' "));

$almt = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `tb_santri`
WHERE nis  = '$nis' ORDER BY tb_santri.id_santri ASC"));

$l = array("", "MTs", "SMP", "MA", "SMK");
$jl = array("", "Reguler", "Prestasi");

if ($data['jkl'] == 'Laki-laki') {
    $h_sq = "WHERE komplek = 'Sunan Bonang' OR komplek = 'Sunan Gunung Jati' ";
} else {
    $h_sq = "WHERE komplek = 'Al-Adawiyah' OR komplek = 'Aisyah' OR komplek = 'Ummu Kulsum' ";
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
                                    <h2>Form Pemilihan Asrama & Lemari Santri <small>santri baru</small></h2>
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
                                                <blockquote class="message">
                                                    <?= $almt['desa'] . ' - ' . $almt['kec'] . ' - ' . $almt['kab'] . ' - ' . $almt['prov'] ?>
                                                </blockquote>
                                                <blockquote class="message">Lembaga : <?= $l[$data['lembaga']] ?> DWK
                                                </blockquote>
                                                <blockquote class="message"> <span class="badge bg-green">Gelombang
                                                        <?= $data['gel'] ?></span> -
                                                    <span class="badge bg-blue"><?= $jl[$data['jalur']] ?></span>
                                                </blockquote>
                                                <blockquote class="message">Kamar :
                                                    <?= $km['komplek'] ?> / <?= $km['kamar'] ?> / <?= $km['loker'] ?>
                                                </blockquote>
                                                <blockquote class="message">Wali Asuh :
                                                    <?= $km['wali'] ?>
                                                </blockquote>
                                                <br />
                                            </div>
                                        </li>
                                    </ul>
                                    <form action="" method="post">
                                        <input type="hidden" name="nis" value="<?= $nis ?>">
                                        <div class="table-responsive">
                                            <table class="table table-striped jambo_table ">
                                                <thead>
                                                    <tr class="headings">
                                                        <th class="column-title">Pilihan </th>
                                                        <th class="column-title" colspan="2"># </th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr class="even pointer">
                                                        <td> Komplek</td>
                                                        <td><select class="form-control" name="komplek" id="komplek" required>
                                                                <option value=""> -- pilih komplek -- </option>
                                                                <?php
                                                                //Perintah sql untuk menampilkan semua data pada tabel jurusan
                                                                $sql = "SELECT * FROM lemari_data $h_sq GROUP BY komplek";
                                                                $hasil = mysqli_query($conn, $sql);
                                                                while ($data = mysqli_fetch_array($hasil)) {
                                                                ?>
                                                                    <option value="<?php echo $data['komplek']; ?>">
                                                                        <?php echo $data['komplek']; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr class="even pointer">
                                                        <td>Pillih Kamar</td>
                                                        <td><select class="form-control" name="kamar" id="kamar" required>
                                                                <option value=""> -- pilih kamar -- </option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr class="even pointer">
                                                        <td>Pillih No. Loker</td>
                                                        <td><select class="form-control" name="loker" id="loker" required>
                                                                <option value=""> -- pilih loker -- </option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <button type="submit" name="save" class="btn btn-success pull-right"><i class="fa fa-save"></i> Simpan Perubahan</button>
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

    <script>
        $("#komplek").change(function() {
            // variabel dari nilai combo box komplek
            var komplek = $("#komplek").val();

            // Menggunakan ajax untuk mengirim dan dan menerima data dari server
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "ambil-data.php",
                data: "komplek=" + komplek,
                success: function(data) {
                    $("#kamar").html(data);
                }
            });
        });

        $("#kamar").change(function() {
            // variabel dari nilai combo box kamar
            var kamar = $("#kamar").val();

            // Menggunakan ajax untuk mengirim dan dan menerima data dari server
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "ambil-data.php",
                data: "kamar=" + kamar,
                success: function(data) {
                    $("#loker").html(data);
                }
            });
        });
    </script>
</body>

</html>

<?php

if (isset($_POST['save'])) {
    $nis = $_POST['nis'];
    $komplek = $_POST['komplek'];
    $kamar = $_POST['kamar'];
    $loker = $_POST['loker'];

    $cek = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM lemari WHERE komplek = '$komplek' AND kamar = '$kamar' AND no = '$loker' "));
    $cek2 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM lemari WHERE nis = '$nis' "));
    if ($cek) {
        echo "
        <script>
        alert('Lemari sudah terpakai');
        window.location.href = 'km_data.php';
        </script>
        ";
        exit;
    }
    if ($cek2 > 0) {
        $sql = mysqli_query($conn, "UPDATE lemari SET komplek = '$komplek', kamar = '$kamar', no = '$loker' WHERE nis = '$nis' ");
    } else {
        $sql = mysqli_query($conn, "INSERT INTO lemari VALUES ('', '$nis', '$komplek', '$kamar', '$loker', '') ");
    }
    $sql2 = mysqli_query($conn, "UPDATE lemari_data SET nis = '$nis' WHERE komplek = '$komplek' AND kamar = '$kamar' AND loker = '$loker' ");

    if ($sql && $sql2) {
        echo "
        <script>
        window.location.href = 'km_data.php';
        </script>
        ";
    }
}

?>
<!-- OK -->