<?php
session_start();
if (!isset($_SESSION['lvl_adm_qwertyuiop'])) {
    header("location: ../login.php");
}
$id = $_SESSION['id'];
//panggil header, css, navigasi
include('koneksi.php');
include('function.php');

$nis = $_GET['nis'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_santri WHERE nis = '$nis' "));


$bl = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
$date = date('d') . "-" . date('F') . "-" . date('Y');
$jal = array("", "Reguler", "Prestasi");
$lm = array("", "MTs", "SMP", "MA", "SMK");
$tmp = array("", "Kantin", "Gus Zaini", "Ny. Farihah", "Ny. Zahro", "Ny. Sa'adah", "Ny. Mamjudah", "Ny. Naily Z.", "Ny. Lathifah");

$pn = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id' "));
$km = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM lemari_data WHERE nis = '$nis' "));
$kos = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM dekos WHERE nis = '$nis' "));

?>

<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<body>
    <div class="wrapperku">
        <div class="row">
            <div class="col-lg-12">
                <h2 style="text-align: center; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Biodata
                    Santri</h2>
                <p style="text-align: center; font-size: 20px; font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
                    Panitia
                    Penerimaan Santri Baru 2021</p>
                <p style="text-align: center; font-size: 25px; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
                    PonPes Darul
                    Lughah Wal Karomah</p>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        No. Pendaftaran : <?= $data['nis']; ?>
                    </div>
                    <div class="panel-heading">
                        Tanggal Daftar : <?= $data['waktu_daftar']; ?>
                        <!-- Tanggal Daftar : <?= date("d F Y", strtotime($data['waktu_daftar'])); ?> -->
                    </div>
                    <!-- /.panel-heading -->

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">

                                <tbody>
                                    <tr>
                                        <th>Gel. / Jalur</th>
                                        <td colspan="2">Gelombang <?= $data['gel']; ?> / <?= $jal[$data['jalur']]; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td rowspan="13"><img src="<?= 'foto_santri/' . $data['foto']; ?>" width="150" /></td>
                                        <th>NIK</th>
                                        <td><?= $data['nik']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>No. KK</th>
                                        <td><?= $data['no_kk']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama</th>
                                        <td><?= $data['nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tetala</th>
                                        <td><?= $data['tempat'] . ", " . tgl($data['tanggal']); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Jenkel</th>
                                        <td><?= $data['jkl']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Anak ke</th>
                                        <td><?= $data['anak_ke']; ?>&nbsp;&nbsp;&nbsp; dari : <?= $data['jml_sdr']; ?>
                                            bersaudara</td>
                                    </tr>
                                    <tr>
                                        <th>Tujuan</th>
                                        <td><?= $lm[$data['lembaga']] . " Darul Lughah Wal Karomah"; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td><?= $data['jln'] . " RT " . $data['rt'] . " RW " . $data['rw'] . ", " . $data['desa'] . " - " . $data['kec'] . " - " . $data['kab']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Nama Bapak</th>
                                        <td><?= $data['bapak']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nama Ibu</th>
                                        <td><?= $data['ibu']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Pkj Bapak</th>
                                        <td><?= $data['a_pkj']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Pkj Ibu</th>
                                        <td><?= $data['i_pkj']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>No. HP</th>
                                        <td><?= $data['hp']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Kamar</th>
                                        <td colspan="2">
                                            <?= $km['komplek'] . " / " . $km['kamar'] . " / " . $km['loker']; ?>
                                            (<?= $km['wali']; ?>)</td>
                                    </tr>
                                    <tr>
                                        <th>Tempat Kos</th>
                                        <td colspan="2">
                                            <?php if (isset($kos['t_kos'])) {
                                                echo $tmp[$kos['t_kos']];
                                            } else {
                                                echo " - ";
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <p>Dengan ini kami mennyatakan bahwa semua keterangan yang kami berikan diatas adalah benar.
                            </p>
                            <p>Kraksaan, <?= date("d M Y"); ?></p>
                            <br>
                            <table width="100%">
                                <tbody>
                                    <tr>
                                        <td style="text-align: center;">Calon Santri</td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        <td style="text-align: center;">Wali Santri</td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        <td style="text-align: center;">Penerima</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        <td> </td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        <td> </td>
                                    </tr>

                                    <tr>
                                        <td> </td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        <td> </td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        <td></td>
                                    </tr>

                                    <tr>
                                        <td style="text-align: center;"></td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        <td style="text-align: center;"> </td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        <td style="text-align: center;"> </td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;"><u><b>( <?= $data['nama'] ?> )</b></u></td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        <td style="text-align: center;"><u><b>( <?= $data['bapak'] ?> )</b></u></td>
                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                        <td style="text-align: center;"><u><b>( <?= $pn['nama']; ?> )</b></u></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- /.table-responsive -->

                    </div>
                    <div class="panel-footer">
                        Catatan* Bukti Pendaftaran ini dibawa saat akan melakukan pendaftaran ulang
                    </div>

                </div>
            </div>
        </div>


    </div>
    <?php
    //footer
    echo "<script>window.print()</script>";
    ?>