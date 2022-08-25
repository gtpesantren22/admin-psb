<?php
include 'koneksi.php';
include 'head.php';

$tt = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(IF(via = 'Transfer', nominal, 0)) as tf, SUM(IF(via = 'Cash', nominal, 0)) as cs FROM regist a JOIN tb_santri b ON a.nis = b.nis WHERE b.ket = 'baru'"));
?>

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Biaya Registratsi Santri Baru</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active" aria-current="page">DataTables</li>
        </ol>
    </div>

    <!-- Row -->
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card bg-gradient-success text-white">
                <div class="card-body">
                    <?= rupiah($tt['tf']); ?>
                    <div class="text-white-50 small">Via Transfer</div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card bg-gradient-primary text-white">
                <div class="card-body">
                    <?= rupiah($tt['cs']); ?>
                    <div class="text-white-50 small">Via Cash</div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card bg-gradient-danger text-white">
                <div class="card-body">
                    <?= rupiah($tt['tf'] + $tt['cs']); ?>
                    <div class="text-white-50 small">Total Pemasukan Registrasi</div>
                </div>
            </div>
        </div>
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Pembayaran Registrasi Santri Baru</h6>
                    <button type="button" data-toggle="modal" data-target="#exampleModal" id="#myBtn" class="btn btn-primary float-right"><i class="fa fa-plus"></i> Tambah Baru</button>
                    <a href="ex_regba.php" target="_blank" class="btn btn-success float-right"><i class="fa fa-download"></i> Export to Excel</a>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover table-sm table-bordered" id="dataTableHover" style="font-size: 13px;">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Lembaga</th>
                                <th>Tanggungan</th>
                                <th>Lunas</th>
                                <th>Sisa</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = mysqli_query($conn, "SELECT a.*, b.* FROM tanggungan a JOIN tb_santri b ON a.nis=b.nis WHERE b.ket = 'baru' ");
                            $lm = array("", "MTs", "SMP", "MA", "SMK");
                            while ($row = mysqli_fetch_assoc($sql)) {
                                $nis = $row['nis'];
                                $tang = mysqli_fetch_assoc(mysqli_query($conn, "SELECT *, (infaq + buku + kartu + kalender + seragam_pes + seragam_lem + orsaba) AS jml FROM tanggungan WHERE nis = '$nis' "));
                                $cek_byr = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(nominal) AS jml FROM regist WHERE nis = '$nis' GROUP BY nis "));
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row['nama']; ?></td>
                                    <td><?= $lm[$row['lembaga']]; ?></td>
                                    <td><?= rupiah($tang['jml']); ?></td>
                                    <td><?= rupiah($cek_byr['jml']); ?></td>
                                    <td><?= rupiah($tang['jml'] - $cek_byr['jml']); ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <?= $cek_byr['jml'] >= $tang['jml'] ? '<button class="btn btn-success btn-sm"><i class="fa fa-check"></i></button>' : '<button class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>' ?>
                                            &nbsp;
                                            <button class="btn btn-warning btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Act
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="<?= 'bayar_regist.php?id=' . $row['id_tgn'] ?>">Edit Bayar</a>
                                                <a class="dropdown-item" onclick="return confirm('Yakin akan dihapus ?')" href="<?= 'hapus.php?kd=tgn&id=' . $row['id_tgn'] ?>">Hapus</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--Row-->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pembayaran Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <table class="table align-items-center table-flush table-hover table-sm" id="dataTableHover2">
                        <thead class="thead-light">
                            <tr>
                                <th>Nama</th>
                                <th>Lembaga</th>
                                <th>Jenis</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            // $lm = array("", "MTs", "SMP", "MA", "SMK");
                            $sql1 = mysqli_query($conn, "SELECT * FROM tb_santri WHERE NOT EXISTS (SELECT * FROM tanggungan WHERE tanggungan.nis=tb_santri.nis) AND ket = 'baru' ");
                            while ($row1 = mysqli_fetch_assoc($sql1)) {
                            ?>
                                <tr>
                                    <td><?= $row1['nama']; ?></td>
                                    <td><?= $lm[$row1['lembaga']]; ?></td>
                                    <td><?= $row1['ket']; ?></td>
                                    <td><a href="<?= 'buat_tgn.php?nis=' . $row1['nis'] ?>"><button class="btn btn-sm btn-success"> Buat</button></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php include 'foot.php';


    ?>