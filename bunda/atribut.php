<?php
include 'koneksi.php';
include 'head.php';

// $tt = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(IF(via = 'Transfer', nominal, 0)) as tf, SUM(IF(via = 'Cash', nominal, 0)) as cs FROM atribut a JOIN tb_santri b ON a.nis = b.nis WHERE b.ket = 'baru'"));

$data = mysqli_query($conn, "SELECT tb_santri.*, atribut.*  FROM tb_santri 
JOIN atribut ON tb_santri.nis=atribut.nis ORDER BY tb_santri.id_santri ASC");
$lm = array("", "MTs DWK", "SMP DWK", "MA DWK", "SMK DWK");
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
                <div class="table-responsive p-3">
                    <table class="table align-items-center table-flush table-hover table-sm table-bordered" id="dataTableHover" style="font-size: 13px;">
                        <thead class="thead-light">
                            <tr>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Wiridan</th>
                                <th>Tatib</th>
                                <th>KTS</th>
                                <th>Mhrm</th>
                                <th>K.Kes</th>
                                <th>Calndr</th>
                                <th>Ft. Pngsh</th>
                                <th>Srgm. Ps</th>
                                <th>Srgm. Lm</th>
                                <th>Act</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($data as $r) :
                                $l = array("", "MTs", "SMP", "MA", "SMK");
                            ?>
                                <tr>
                                    <td><?= $r['nis']; ?></td>
                                    <td><?= $r['nama']; ?></td>
                                    <td><?php if ($r['wir'] != 0) {
                                            echo "<center><i class='fa fa-check' style='color: green'></i></center>";
                                        } else {
                                            echo "<center><i class='fa fa-times' style='color: red'></i></center>";
                                        }
                                        ?>
                                    </td>
                                    <td><?php if ($r['tatib'] != 0) {
                                            echo "<center><i class='fa fa-check' style='color: green'></i></center>";
                                        } else {
                                            echo "<center><i class='fa fa-times' style='color: red'></i></center>";
                                        }
                                        ?>
                                    </td>
                                    <td><?php if ($r['kts'] != 0) {
                                            echo "<center><i class='fa fa-check' style='color: green'></i></center>";
                                        } else {
                                            echo "<center><i class='fa fa-times' style='color: red'></i></center>";
                                        }
                                        ?>
                                    </td>
                                    <td><?php if ($r['mahrom'] != 0) {
                                            echo "<center><i class='fa fa-check' style='color: green'></i></center>";
                                        } else {
                                            echo "<center><i class='fa fa-times' style='color: red'></i></center>";
                                        }
                                        ?>
                                    </td>
                                    <td><?php if ($r['kes'] != 0) {
                                            echo "<center><i class='fa fa-check' style='color: green'></i></center>";
                                        } else {
                                            echo "<center><i class='fa fa-times' style='color: red'></i></center>";
                                        }
                                        ?>
                                    </td>
                                    <td><?php if ($r['kalender'] != 0) {
                                            echo "<center><i class='fa fa-check' style='color: green'></i></center>";
                                        } else {
                                            echo "<center><i class='fa fa-times' style='color: red'></i></center>";
                                        }
                                        ?>
                                    </td>
                                    <td><?php if ($r['pengasuh'] != 0) {
                                            echo "<center><i class='fa fa-check' style='color: green'></i></center>";
                                        } else {
                                            echo "<center><i class='fa fa-times' style='color: red'></i></center>";
                                        }
                                        ?>
                                    </td>
                                    <td><?php if ($r['seragam'] != 0) {
                                            echo "<center><i class='fa fa-check' style='color: green'></i></center>";
                                        } else {
                                            echo "<center><i class='fa fa-times' style='color: red'></i></center>";
                                        }
                                        ?>
                                    </td>
                                    <td><?php if ($r['seragam_l'] != 0) {
                                            echo "<center><i class='fa fa-check' style='color: green'></i></center>";
                                        } else {
                                            echo "<center><i class='fa fa-times' style='color: red'></i></center>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="<?= 'lengkap_atr.php?nis=' . $r['nis'] ?>"><button type="button" class="btn btn-success btn-sm">Lengkapi</button></a>
                                    </td>
                                </tr>
                            <?php
                                $i++;
                            endforeach;
                            ?>
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
                            $sql1 = mysqli_query($conn, "SELECT * FROM tb_santri WHERE NOT EXISTS (SELECT * FROM atribut WHERE atribut.nis=tb_santri.nis) AND tb_santri.ket = 'baru' ");
                            while ($row1 = mysqli_fetch_assoc($sql1)) {
                            ?>
                                <tr>
                                    <td><?= $row1['nama']; ?></td>
                                    <td><?= $lm[$row1['lembaga']]; ?></td>
                                    <td><?= $row1['ket']; ?></td>
                                    <td>
                                        <a href="<?= 'berkasAdd.php?kode=atr&nis=' . $row1['nis'] ?>"><button class="btn btn-sm btn-success"> Pilih santri ini</button></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php include 'foot.php'; ?>