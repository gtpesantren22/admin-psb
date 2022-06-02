<?php

require 'function.php';


$nis = $_GET['nis'];

$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_santri WHERE nis = '$nis' "));
$bl = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
$tg = explode('-', $data['tanggal']);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Form Edit Data </title>

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
            <?php
            include 'nav.php';
            ?>
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Form Edit Data <small>mengupdate data santri</small></h2>
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

                                    <form action="aksi.php?fn=edit_s" method="post" class="form-horizontal form-label-left">
                                        <input type="hidden" name="nis" value="<?= $data['nis'] ?>">
                                        <div class="col-md-6">
                                            <span class="section">Info Pribadi</span>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nik">NIK
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input value="<?= $data['nik'] ?>" id="nik" class="form-control col-md-7 col-xs-12" name="nik" value="<?= $data['nik'] ?>" required="required" type="text">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">No KK
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input value="<?= $data['no_kk'] ?>" class="form-control col-md-7 col-xs-12" name="no_kk" required="required" type="text">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input value="<?= $data['nama'] ?>" class="form-control col-md-7 col-xs-12" name="nama" required="required" type="text">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Tetala
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input value="<?= $data['tempat'] ?>" id="tempat" class="form-control col-md-7 col-xs-12" name="tempat" required="required" type="text">
                                                    <select id="heard" name="tgl" class="form-control" required>
                                                        <option value=""> --pilih tanggal-- </option>
                                                        <?php
                                                        for ($i = 1; $i <= 31; $i++) {
                                                            if ($tg[0] == $i) {
                                                                $c = 'selected';
                                                            } else {
                                                                $c = '';
                                                            }
                                                            echo "<option $c value=" . $i . ">" . $i . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                    <select id="heard" name="bln" class="form-control" required>
                                                        <option value=""> --pilih tanggal-- </option>
                                                        <?php
                                                        for ($i = 1; $i <= 12; $i++) {
                                                            if ($tg[1] == $i) {
                                                                $c = 'selected';
                                                            } else {
                                                                $c = '';
                                                            }
                                                            echo "<option $c value=" . $i . ">" . $bl[$i] . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                    <select id="heard" name="thn" class="form-control" required>
                                                        <option value=""> --pilih tanggal-- </option>
                                                        <?php
                                                        $now = date("Y");
                                                        for ($i = 1990; $i <= $now; $i++) {
                                                            if ($tg[2] == $i) {
                                                                $c = 'selected';
                                                            } else {
                                                                $c = '';
                                                            }
                                                            echo "<option $c value=" . $i . ">" . $i . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jkl">JKL
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="radio" class="flat" name="jkl" value="Laki-laki" <?php if ($data['jkl'] == 'Laki-laki') echo 'checked' ?> /> Laki-laki
                                                    <input type="radio" class="flat" name="jkl" value="Perempuan" <?php if ($data['jkl'] == 'Perempuan') echo 'checked' ?> /> Perempuan
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Anak ke
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input value="<?= $data['anak_ke'] ?>" class="form-control col-md-7 col-xs-12" name="anak_ke" required="required" type="number">
                                                    <label for=""> dari : </label>
                                                    <input value="<?= $data['jml_sdr'] ?>" class="form-control col-md-7 col-xs-12" name="jml_sdr" required="required" type="number">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Lembaga
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input type="radio" class="flat" name="lembaga" value="1" <?php if ($data['lembaga'] == '1') echo 'checked' ?> /> MTs
                                                    <input type="radio" class="flat" name="lembaga" value="2" <?php if ($data['lembaga'] == '2') echo 'checked' ?> /> SMP
                                                    <input type="radio" class="flat" name="lembaga" value="3" <?php if ($data['lembaga'] == '3') echo 'checked' ?> /> MA
                                                    <input type="radio" class="flat" name="lembaga" value="4" <?php if ($data['lembaga'] == '4') echo 'checked' ?> /> SMK
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Alamat
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input value="<?= $data['jln'] ?>" class="form-control col-md-7 col-xs-12" name="jln" required="required" type="text">
                                                    <input value="<?= $data['rt'] ?>" class="form-control col-md-7 col-xs-12" name="rt" required="required" type="text">
                                                    <input value="<?= $data['rw'] ?>" class="form-control col-md-7 col-xs-12" name="rw" required="required" type="text">
                                                    <textarea disabled id="message" required="required" class="form-control" name="message" data-parsley-trigger="keyup"><?= $data['desa'] . ' - ' . $data['kec'] . ' - ' . $data['kab'] . ' - ' . $data['prov'] ?></textarea>
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama"><i>Jika ada perubahan alamat</i>
                                                </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <select name="prop" id="provinsi" class="form-control">
                                                        <option value="">Pilih Provinsi</option>
                                                    </select>
                                                    <select name="kota" id="kabupaten" class="form-control">
                                                        <option value="">Pilih Kota</option>
                                                    </select>
                                                    <select name="kec" id="kecamatan" class="form-control">
                                                        <option value="">Pilih Kecamatan</option>
                                                    </select>
                                                    <select name="kel" id="kelurahan" class="form-control">
                                                        <option value="">Pilih Kelurahan/Desa</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="section">Info Pendaftaran</span>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nik">No. Daftar
                                                    <span class="required">*</span>
                                                </label>
                                                <label class="control-label col-md-6 col-sm-6 col-xs-12" for="nik"><?= $data['nis'] ?>
                                                </label>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nik">Gelombang
                                                    <span class="required">*</span>
                                                </label>
                                                <label class="control-label col-md-6 col-sm-6 col-xs-12" for="nik">Gelombang <?= $data['gel'] ?>
                                                </label>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nik">Jalur
                                                    <span class="required">*</span>
                                                </label>
                                                <label class="control-label col-md-6 col-sm-6 col-xs-12" for="nik"> <?php if ($data['jalur'] == 1) {
                                                                                                                        echo "Reguler";
                                                                                                                    } else {
                                                                                                                        echo "Prestasi";
                                                                                                                    }
                                                                                                                    ?>
                                                </label>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nik">Waktu
                                                    <span class="required">*</span>
                                                </label>
                                                <label class="control-label col-md-6 col-sm-6 col-xs-12" for="nik"> <?= $data['waktu_daftar'] ?>
                                                </label>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Sekolah Asal
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input value="<?= $data['asal'] ?>" class="form-control col-md-7 col-xs-12" name="asal" required="required" type="text">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Almt Sekolah
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input value="<?= $data['a_asal'] ?>" class="form-control col-md-7 col-xs-12" name="a_asal" required="required" type="text">
                                                </div>
                                            </div>
                                            <span class="section">Info Orang Tua</span>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama Bapak
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input value="<?= $data['bapak'] ?>" class="form-control col-md-7 col-xs-12" name="bapak" required="required" type="text">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Pekerjaan Bpk
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <select id="heard" name="a_pkj" class="form-control" required>
                                                        <option value=""> --pilih-- </option>
                                                        <?php
                                                        $pk = mysqli_query($conn, "SELECT nama AS pj FROM pkj");
                                                        while ($p = mysqli_fetch_assoc($pk)) {
                                                            if ($data['a_pkj'] == $p['pj']) {
                                                                $c = 'selected';
                                                            } else {
                                                                $c = '';
                                                            } ?>
                                                            <option <?= $c; ?> value="<?= $p['pj']; ?>"><?= $p['pj'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Nama Ibu
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input value="<?= $data['ibu'] ?>" class="form-control col-md-7 col-xs-12" name="ibu" required="required" type="text">
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">Pekerjaan Ibu
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <select id="heard" name="i_pkj" class="form-control" required>
                                                        <option value=""> --pilih-- </option>
                                                        <?php
                                                        $pk = mysqli_query($conn, "SELECT nama AS pj FROM pkj");
                                                        while ($p = mysqli_fetch_assoc($pk)) {
                                                            if ($data['i_pkj'] == $p['pj']) {
                                                                $c = 'selected';
                                                            } else {
                                                                $c = '';
                                                            } ?>
                                                            <option <?= $c; ?> value="<?= $p['pj']; ?>"><?= $p['pj'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="item form-group">
                                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama">No HP
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 col-xs-12">
                                                    <input value="<?= $data['hp'] ?>" class="form-control col-md-7 col-xs-12" name="hp" required="required" type="number">
                                                </div>
                                            </div>
                                            <br>
                                            <span class="section"></span>
                                            <div class="item form-group">
                                                <div class="col-md-6 col-sm-6 offset-md-3">
                                                    <button name="update" type="submit" class="btn btn-info">Update</button>
                                                    <button class="btn btn-danger" type="reset">Batal</button>
                                                </div>
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
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <script src="vendors/validator/validator.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $.ajax({
                type: 'POST',
                url: "ajax/get_provinsi.php",
                cache: false,
                success: function(msg) {
                    $("#provinsi").html(msg);
                }
            });

            $("#provinsi").change(function() {
                var provinsi = $("#provinsi").val();
                $.ajax({
                    type: 'POST',
                    url: "ajax/get_kabupaten.php",
                    data: {
                        provinsi: provinsi
                    },
                    cache: false,
                    success: function(msg) {
                        $("#kabupaten").html(msg);
                    }
                });
            });

            $("#kabupaten").change(function() {
                var kabupaten = $("#kabupaten").val();
                $.ajax({
                    type: 'POST',
                    url: "ajax/get_kecamatan.php",
                    data: {
                        kabupaten: kabupaten
                    },
                    cache: false,
                    success: function(msg) {
                        $("#kecamatan").html(msg);
                    }
                });
            });

            $("#kecamatan").change(function() {
                var kecamatan = $("#kecamatan").val();
                $.ajax({
                    type: 'POST',
                    url: "ajax/get_kelurahan.php",
                    data: {
                        kecamatan: kecamatan
                    },
                    cache: false,
                    success: function(msg) {
                        $("#kelurahan").html(msg);
                    }
                });
            });
        });
    </script>

</body>

</html>