<?php
include 'koneksi.php';
include 'head.php';
$tt = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(IF(via = 'Transfer', nominal, 0)) as tf, SUM(IF(via = 'Cash', nominal, 0)) as cs FROM bp_daftar a JOIN tb_santri b ON a.nis = b.nis WHERE b.ket = 'lama'"));

?>

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Biaya Pendaftaran Santri Lanjutan</h1>
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
                    <div class="text-white-50 small">Total Pemasukan Pendaftaran</div>
                </div>
            </div>
        </div>
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Pembayaran Pendaftaran Santri Baru</h6>
                    <button type="button" data-toggle="modal" data-target="#exampleModal" id="#myBtn"
                        class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Baru</button>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover table-sm table-bordered"
                        id="dataTableHover" style="font-size: 13px;">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Lembaga</th>
                                <th>Nominal</th>
                                <th>Tgl Bayar</th>
                                <th>Tgl Input</th>
                                <th>Verifikator</th>
                                <th>Via</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = mysqli_query($conn, "SELECT a.*, b.* FROM bp_daftar a JOIN tb_santri b ON a.nis=b.nis WHERE b.ket = 'lama' ORDER BY a.created ASC ");
                            $lm = array("", "MTs", "SMP", "MA", "SMK");
                            while ($row = mysqli_fetch_assoc($sql)) {
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['nama']; ?></td>
                                <td><?= $lm[$row['lembaga']]; ?></td>
                                <td><?= rupiah($row['nominal']); ?></td>
                                <td><?= $row['tgl_bayar']; ?></td>
                                <td><?= $row['created']; ?></td>
                                <td><?= $row['kasir']; ?></td>
                                <td><span class="badge badge-success"><?= $row['via']; ?></span></td>
                                <td>
                                    <a onclick="return confirm('Yakin akan dihapus ?')"
                                        href="<?= 'hapus.php?kd=hpend&id=' . $row['id_bayar'] ?>"><button
                                            class="btn btn-sm btn-danger"> Del</button></a>
                                    <a onclick="return confirm('Yakin akan dikirim ?')"
                                        href="<?= 'kirim.php?kd=df&id=' . $row['id_bayar'] ?>"><button
                                            class="btn btn-sm btn-primary"><i
                                                class="fa fa-paper-plane"></i></button></a>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                            $sql1 = mysqli_query($conn, "SELECT * FROM tb_santri WHERE NOT EXISTS (SELECT * FROM tanggungan WHERE tanggungan.nis=tb_santri.nis) ");
                            while ($row1 = mysqli_fetch_assoc($sql1)) {
                            ?>
                            <tr>
                                <td><?= $row1['nama']; ?></td>
                                <td><?= $lm[$row1['lembaga']]; ?></td>
                                <td><?= $row1['ket']; ?></td>
                                <td><a href="<?= 'bayar_pd.php?id=' . $row1['id_santri'] ?>"><button
                                            class="btn btn-sm btn-success"> Bayar</button></a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php include 'foot.php'; ?>