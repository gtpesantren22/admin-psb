<?php
include 'koneksi.php';
include 'head.php';
?>

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Santri</h1>
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
                    <h6 class="m-0 font-weight-bold text-primary">Data Santri Baru</h6>
                </div>
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover table-sm" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Jenkel</th>
                                <th>Gel</th>
                                <th>No. HP</th>
                                <th>Lembaga Tujuan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = mysqli_query($conn, "SELECT * FROM tb_santri WHERE ket = 'baru' ORDER BY waktu_daftar ASC ");
                            $lm = array("", "MTs", "SMP", "MA", "SMK");
                            while ($row = mysqli_fetch_assoc($sql)) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row['nis']; ?></td>
                                    <td><?= $row['nama']; ?></td>
                                    <td><?= $row['desa'] . ' - ' . $row['kec'] . ' - ' . $row['kab']; ?></td>
                                    <td><?= $row['jkl']; ?></td>
                                    <td><?= $row['gel']; ?></td>
                                    <td><?= $row['hp']; ?></td>
                                    <td><?= $lm[$row['lembaga']]; ?></td>
                                    <td><?php if ($row['stts'] == 'Terverifikasi') {
                                            echo " <span class='badge badge-succes'>Terverifikasi</span> ";
                                        } else {
                                            echo " <span class='badge badge-danger'>Belum Terverifikasi</span> ";
                                        } ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--Row-->

    <?php include 'foot.php'; ?>