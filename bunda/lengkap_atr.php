<?php
include 'koneksi.php';
include 'head.php';

// $tt = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(IF(via = 'Transfer', nominal, 0)) as tf, SUM(IF(via = 'Cash', nominal, 0)) as cs FROM atribut a JOIN tb_santri b ON a.nis = b.nis WHERE b.ket = 'baru'"));

$nis = $_GET['nis'];

$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT *  FROM tb_santri WHERE nis = '$nis' "));
$data2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT *  FROM atribut WHERE nis = '$nis' "));

$almt = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_santri WHERE nis  = '$nis' "));

$l = array("", "MTs", "SMP", "MA", "SMK");
$jl = array("", "Reguler", "Prestasi");
?>

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Penerimaan Atribut santri Santri Baru</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active" aria-current="page">DataTables</li>
        </ol>
    </div>

    <!-- Row -->
    <div class="row">
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Atribut Pendaftaran Santri Baru</h6>
                    <button type="button" data-toggle="modal" data-target="#exampleModal" id="#myBtn" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Baru</button>
                </div>
                <ul class="messages">
                    <li>
                        <!-- <img src="img/user.png" class="avatar" alt="Avatar"> -->
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
                <div class="card-body">
                    <form action="aksi.php?fn=berkas" method="post">
                        <input type="hidden" name="nis" value="<?= $nis ?>">
                        <div class="row">
                            <div class="col-6">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr class="headings">
                                                <th class="column-title">No. </th>
                                                <th class="column-title">Nama Barang </th>
                                                <th class="column-title">Status Penerimaan </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr class="even pointer">
                                                <td>1</td>
                                                <td>Buku Pedoman Wiridan</td>
                                                <td class="a-center"><input type="checkbox" value="1" class="flat" name="wir" <?php if ($data2['wir'] == 1) {
                                                                                                                                    echo 'checked';
                                                                                                                                }  ?>></td>

                                            </tr>
                                            <tr class="even pointer">
                                                <td>2</td>
                                                <td>Buku Tatib & Perizinan</td>
                                                <td class="a-center"><input type="checkbox" value="1" class="flat" name="tatib" <?php if ($data2['tatib'] == 1) {
                                                                                                                                    echo 'checked';
                                                                                                                                } ?>></td>
                                            </tr>
                                            <tr class="even pointer">
                                                <td>3</td>
                                                <td>Kartu KTS</td>
                                                <td class="a-center"><input type="checkbox" value="1" class="flat" name="kts" <?php if ($data2['kts'] == 1) {
                                                                                                                                    echo 'checked';
                                                                                                                                }  ?>></td>
                                            </tr>
                                            <tr class="even pointer">
                                                <td>4</td>
                                                <td>Kartu Mahrom</td>
                                                <td class="a-center"><input type="checkbox" value="1" class="flat" name="mahrom" <?php if ($data2['mahrom'] == 1) {
                                                                                                                                        echo 'checked';
                                                                                                                                    }  ?>></td>
                                            </tr>
                                            <tr class="even pointer">
                                                <td>5</td>
                                                <td>Kartu Kesehatan</td>
                                                <td class="a-center"><input type="checkbox" value="1" class="flat" name="kes" <?php if ($data2['kes'] == 1) {
                                                                                                                                    echo 'checked';
                                                                                                                                }  ?>></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr class="headings">
                                                <th class="column-title">No. </th>
                                                <th class="column-title">Nama Barang </th>
                                                <th class="column-title">Status Penerimaan </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr class="even pointer">
                                                <td>1</td>
                                                <td>Buku Pedoman Wiridan</td>
                                                <td class="a-center"><input type="checkbox" value="1" class="flat" name="wir" <?php if ($data2['wir'] == 1) {
                                                                                                                                    echo 'checked';
                                                                                                                                }  ?>></td>

                                            </tr>
                                            <tr class="even pointer">
                                                <td>2</td>
                                                <td>Buku Tatib & Perizinan</td>
                                                <td class="a-center"><input type="checkbox" value="1" class="flat" name="tatib" <?php if ($data2['tatib'] == 1) {
                                                                                                                                    echo 'checked';
                                                                                                                                } ?>></td>
                                            </tr>
                                            <tr class="even pointer">
                                                <td>3</td>
                                                <td>Kartu KTS</td>
                                                <td class="a-center"><input type="checkbox" value="1" class="flat" name="kts" <?php if ($data2['kts'] == 1) {
                                                                                                                                    echo 'checked';
                                                                                                                                }  ?>></td>
                                            </tr>
                                            <tr class="even pointer">
                                                <td>4</td>
                                                <td>Kartu Mahrom</td>
                                                <td class="a-center"><input type="checkbox" value="1" class="flat" name="mahrom" <?php if ($data2['mahrom'] == 1) {
                                                                                                                                        echo 'checked';
                                                                                                                                    }  ?>></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="up" class="btn btn-success pull-right"><i class="fa fa-save"></i> Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Row-->



    <?php include 'foot.php'; ?>