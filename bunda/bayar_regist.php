<?php
include 'koneksi.php';
include 'head.php';

$id = $_GET['id'];
$tang = mysqli_fetch_assoc(mysqli_query($conn, "SELECT *, (infaq + buku + kartu + kalender + seragam_pes + seragam_lem + orsaba) AS jml FROM tanggungan WHERE id_tgn = '$id' "));
$nis = $tang['nis'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_santri WHERE nis = '$nis' "));
$jkl = $data['jkl'];
$ket = $data['ket'];
$kk = $data['no_kk'];

$byr = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM biaya WHERE jkl = '$jkl' AND ket = '$ket' "));
$cek_byr = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(nominal) AS jml FROM regist WHERE nis = '$nis' GROUP BY nis "));
$cek_kk = mysqli_query($conn, "SELECT * FROM tb_santri WHERE no_kk = '$kk' AND ket = 'baru' ");

$lm = array("", "MTs DWK", "SMP DWK", "MA DWK", "SMK DWK");
$pr = array("", "Reguler", "Prestasi");


?>

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Pembayaran Pendaftaran</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Forms</li>
            <li class="breadcrumb-item active" aria-current="page">Form Basics</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-7">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Identitas Santri</h6>
                </div>
                <div class="card-body">
                    <table width="100%">
                        <tr>
                            <th>Nama</th>
                            <th>:</th>
                            <th><?= $data['nama']; ?></th>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <th>:</th>
                            <th><?= $data['desa'] . '-' . $data['kec'] . '-' . $data['kab']; ?></th>
                        </tr>
                        <tr>
                            <th>Lembaga</th>
                            <th>:</th>
                            <th><?= $lm[$data['lembaga']]; ?></th>
                        </tr>
                        <tr>
                            <th>Jkl</th>
                            <th>:</th>
                            <th><?= $data['jkl']; ?></th>
                        </tr>
                        <tr>
                            <th>Gelombang</th>
                            <th>:</th>
                            <th>Gel. <?= $data['gel']; ?></th>
                        </tr>
                        <tr>
                            <th>Jalur</th>
                            <th>:</th>
                            <th><?= $pr[$data['jalur']]; ?></th>
                        </tr>
                        <?php if (mysqli_num_rows($cek_kk) > 1) { ?>
                            <tr>
                                <th colspan="3"><span class="badge badge-primary"><?= mysqli_num_rows($cek_kk); ?> Bersaudara : </span>
                                    <?php while ($a = mysqli_fetch_assoc($cek_kk)) { ?>
                                        <span class="badge badge-danger"><?= $a['nama']; ?> (<?= $a['ket']; ?>)</span>
                                    <?php } ?>
                                </th>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card bg-gradient-success text-white">
                <div class="card-body">
                    Tanggungan : <?= rupiah($tang['jml']); ?>
                </div>
            </div>
            <div class="card bg-gradient-warning text-white">
                <div class="card-body">
                    Uang Masuk : <?= rupiah($cek_byr['jml']); ?>
                </div>
            </div>
            <div class="card bg-gradient-danger text-white">
                <div class="card-body">
                    Kurang : <?= rupiah($tang['jml'] - $cek_byr['jml']); ?>
                </div>
            </div>
        </div>

        <div class="col-lg-7">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tanggungan Santri</h6>
                    <button type="button" data-toggle="modal" data-target="#exampleModal" id="#myBtn" class="btn btn-outline-secondary btn-sm">Generate Tanggungan</button>
                </div>
                <div class="card-body">
                    <table width="100%" class="table table-sm table-bordered">
                        <tr>
                            <th>Uang Gedung</th>
                            <th><?= rupiah($tang['infaq']); ?> <?= mysqli_num_rows($cek_kk) > 1 ? '(50%)' : '' ?></th>
                        </tr>
                        <tr>
                            <th>Buku Pedoman Wiridan, Perizinan & Tatib</th>
                            <th><?= rupiah($tang['buku']); ?></th>
                        </tr>
                        <tr>
                            <th>KTS, Kartu Mahrom, Kartu Kesehatan & Foto</th>
                            <th><?= rupiah($tang['kartu']); ?></th>
                        </tr>
                        <tr>
                            <th>Kalender Pesantren</th>
                            <th><?= rupiah($tang['kalender']); ?></th>
                        </tr>
                        <tr>
                            <th>Seragam Pesantren</th>
                            <th><?= rupiah($tang['seragam_pes']); ?></th>
                        </tr>
                        <tr>
                            <th>Seragam Lembaga (Khas dan Olahraga)</th>
                            <th><?= rupiah($tang['seragam_lem']); ?> <?= $data['jalur'] == 2 ? '(gratis)' : '' ?></th>
                        </tr>
                        <tr>
                            <th>ORSABA</th>
                            <th><?= rupiah($tang['orsaba']); ?></th>
                        </tr>
                        <tr style="background-color: lightslategray; color: white;">
                            <th>Total</th>
                            <th><?= rupiah($tang['jml']); ?></th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <!-- General Element -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Input Pembayaran</h6>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="nis" value="<?= $data['nis']; ?>">
                        <table width="100%">
                            <tr>
                                <td>
                                    <label for="exampleFormControlInput1">Nominal</label>
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="uang" name="nominal" placeholder="Rp. .." required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="exampleFormControlInput1">Tanggal Bayar</label>
                                </td>
                                <td>
                                    <input type="date" class="form-control" name="tgl_bayar" placeholder="Rp. .." required>
                                </td><br>
                            </tr>
                            <tr>
                                <td>
                                    <label>Radio Button</label>
                                </td>
                                <td>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio3" name="via" class="custom-control-input" value="Transfer" required>
                                        <label class="custom-control-label" for="customRadio3">Transfer</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio4" name="via" class="custom-control-input" value="Cash" required>
                                        <label class="custom-control-label" for="customRadio4">Cash</label>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <button type="submit" name="simpan" class="btn btn-primary float-right">Simpan Data</button>
                    </form>
                </div>
            </div>

        </div>

        <div class="col-lg-12">
            <!-- Form Basic -->
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">History Pembayaran Santri</h6>
                </div>
                <div class="card-body">
                    <table width="100%" class="table table-sm table-bordered" id="dataTableHover">
                        <thead style="background-color: limegreen; color: linen;">
                            <tr>
                                <th>No</th>
                                <th>Tgl Bayar</th>
                                <th>Penerima</th>
                                <th>Via</th>
                                <th>Waktu Input</th>
                                <th>Nominal</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $rg = mysqli_query($conn, "SELECT * FROM regist WHERE nis = '$nis' ");
                            while ($a = mysqli_fetch_assoc($rg)) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $a['tgl_bayar']; ?></td>
                                    <td><?= $a['kasir']; ?></td>
                                    <td><?= $a['via']; ?></td>
                                    <td><?= $a['created']; ?></td>
                                    <td><?= rupiah($a['nominal']); ?></td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#eddit<?= $a['id_regist']; ?>" id="#myBtn"><i class="fa fa-edit"></i></button>
                                        <a href="hapus.php?kd=rgs&id=<?= $a['id_regist']; ?>" onclick="return confirm('Yakin akan dihapus ?')">
                                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        </a>
                                        <a href="nota.php?id=<?= $a['id_regist']; ?>" target="_blank">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-print"></i></button>
                                        </a>
                                    </td>
                                    <!-- Modal -->
                                    <div class="modal fade" id="eddit<?= $a['id_regist']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Pembayaran Santri</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="post">
                                                        <input type="hidden" name="id" value="<?= $a['id_regist']; ?>">
                                                        <input type="hidden" name="asal" value="<?= $a['nominal']; ?>">
                                                        <b>Tgl Input : <?= $a['created'] ?><br>
                                                            Penerima : <?= $a['kasir'] ?>
                                                        </b>
                                                        <hr>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Nominal</label>
                                                            <input type="text" class="form-control" id="uang3" name="nominal" placeholder="Rp. .." value="<?= $a['nominal']; ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Tgl Bayar</label>
                                                            <input type="date" class="form-control" name="tgl_bayar" placeholder="Rp. .." value="<?= $a['tgl_bayar']; ?>" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Via Pembayaran</label>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="customRadio3" name="via" class="custom-control-input" value="Transfer" required <?= $a['via'] == 'Transfer' ? 'checked' : ''; ?>>
                                                                <label class="custom-control-label" for="customRadio3">Transfer</label>
                                                            </div>
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" id="customRadio4" name="via" class="custom-control-input" value="Cash" required <?= $a['via'] == 'Cash' ? 'checked' : ''; ?>>
                                                                <label class="custom-control-label" for="customRadio4">Cash</label>
                                                            </div>
                                                        </div>
                                                        <button type="submit" name="upp" class="btn btn-primary">Simpan Data</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot style="background-color: limegreen; color: linen;">
                            <tr>
                                <th colspan="5">TOTAL</th>
                                <th colspan="2"><?= rupiah($cek_byr['jml']); ?></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!--Row-->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Buat Tanggungan Santri</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input type="hidden" name="nis" value="<?= $data['nis']; ?>">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nominal Infaq yang dipilih</label>
                            <input type="text" class="form-control" id="uang2" name="infaq" placeholder="Rp. .." required>
                        </div>
                        <button type="submit" name="add" class="btn btn-primary">Simpan Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include 'foot.php';

    if (isset($_POST['add'])) {

        $nis = $_POST['nis'];
        $infaq = preg_replace("/[^0-9]/", "", $_POST['infaq']);
        $buku = preg_replace("/[^0-9]/", "", $byr['buku']);
        $kartu = preg_replace("/[^0-9]/", "", $byr['kartu']);
        $kalender = preg_replace("/[^0-9]/", "", $byr['kalender']);
        $seragam_pes = preg_replace("/[^0-9]/", "", $byr['seragam_pes']);
        $seragam_lem = preg_replace("/[^0-9]/", "", $byr['seragam_lem']);
        $orsaba = preg_replace("/[^0-9]/", "", $byr['orsaba']);

        if (mysqli_num_rows($cek_kk) > 1) {
            $infaqOk = $infaq / 2;
        } else {
            $infaqOk = $infaq;
        }

        if ($data['jalur'] == 2) {
            $seragam_lemOK = 0;
        } else {
            $seragam_lemOK = $seragam_lem;
        }


        $sql = mysqli_query($conn, "UPDATE tanggungan SET infaq = '$infaqOk', buku = '$buku', kartu = '$kartu', kalender = '$kalender', seragam_pes = '$seragam_pes', seragam_lem = '$seragam_lemOK', orsaba = '$orsaba' WHERE id_tgn = '$id' ");
        if ($sql) {
            mysqli_query($conn, "UPDATE tb_santri SET stts = 'Terverifikasi' WHERE nis = '$nis' ");
            echo "
                    <script>
                            Swal.fire({
                                title: 'Berhasil',
                                text: 'Pembayaran Berhasil',
                                icon: 'success',
                                showConfirmButton: false
                            });
                            var millisecondsToWait = 1000;
                            setTimeout(function() {
                                document.location.href = 'bayar_regist.php?id=" . $id . "'
                            }, millisecondsToWait);
                        </script>
                    ";
        }
    }

    if (isset($_POST['simpan'])) {
        $id_s = $uuid;
        $nis = $_POST['nis'];
        $nominal = preg_replace("/[^0-9]/", "", $_POST['nominal']);
        $tgl_bayar = $_POST['tgl_bayar'];
        $via = $_POST['via'];

        $jml_bayar = $nominal + $cek_byr['jml'];

        if ($data['gel'] == '1') {
            $link = 'https://chat.whatsapp.com/L8O3TgvrpLVFqMejIMoIF3';
            $jadwal = 'Penyerahan berkas dan Tes : 26-28 February 2022';
        } else if ($data['gel'] == '2') {
            $link = 'https://chat.whatsapp.com/Er4uy1eXYAg1PoOTZ9lnCp';
            $jadwal = 'Penyerahan berkas dan Tes : 26-28 Maret 2022';
        } else if ($data['gel'] == '3') {
            $link = 'https://chat.whatsapp.com/FA5KGjmYmrxCGSdg1j7BPD';
            $jadwal = 'Penyerahan berkas dan Tes : 28-30 Mei 2022';
        }

        $pesan = '*Terimakasih*

*Kode Pembayaran : ' . strtoupper($id_s) . '*
Pembayaran Pendaftaran, atas :
        
Nama : ' . $data['nama'] . '
Alamat : ' . $data['desa'] . '-' . $data['kec'] . '-' . $data['kab'] . '
Lembaga tujuan : ' . $lm[$data['lembaga']] . '
Nominal : ' . rupiah($nominal) . '
waktu bayar : ' . date('d-m-Y H:i:s') . '
Penerima : ' . $nama_user . '

*telah TEREGISTRASI*
selanjutnya, Silahkan bergabung Group WA Santri baru dengan klik link dibawah, untuk mengetahui informasi test pendaftaran santri baru dan Informasi Lainnya.

*' . $link . '*
_*Link diatas hanya untuk santri baru*_

*Jumlah Tanggungan : ' . rupiah($tang['jml']) . '*
*Sudah Bayar : ' . rupiah($jml_bayar) . '*
*Kekurangan  : ' . rupiah($tang['jml'] - $jml_bayar) . '*
        
_*NB : 
	- Calon Santri diwajibkan memakai baju putih songkok/kerudung hitam
	- Pesan ini sebgai bukti pembayaran yang sah (Harus dari WA Bendahara PSB)*_';

        if ($jml_bayar > $tang['jml']) {
            echo "
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Maaf',
                            text: 'Pembayaran Anda Melebihi Ambang Batas!'
                        });
                    </script>
                    ";
        } else {
            $sql = mysqli_query($conn, "INSERT INTO regist VALUES ('$uuid', '$nis','$nominal','$tgl_bayar','$via','$nama_user', NOW()) ");

            if ($sql) {
                mysqli_query($conn, "UPDATE tb_santri SET stts = 'Terverifikasi' WHERE nis = '$nis' ");
                echo "
                    <script>
                            Swal.fire({
                                title: 'Berhasil',
                                text: 'Pembayaran Berhasil',
                                icon: 'success',
                                showConfirmButton: false
                            });
                            var millisecondsToWait = 1000;
                            setTimeout(function() {
                                document.location.href = 'bayar_regist.php?id=" . $id . "'
                            }, millisecondsToWait);
                        </script>
                    ";

                $curl = curl_init();
                curl_setopt_array(
                    $curl,
                    array(
                        CURLOPT_URL => 'http://8.215.26.187:3000/api/sendMessage',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        // CURLOPT_POSTFIELDS => 'apiKey=fb209be1f23625e43cbf285e57c0c0f2&phone=' . $data['hp'] . '&message=' . $pesan,
                        CURLOPT_POSTFIELDS => 'apiKey=fb209be1f23625e43cbf285e57c0c0f2&phone=0823384&message=' . $pesan,
                    )
                );
                $response = curl_exec($curl);
                curl_close($curl);
            }
        }
    }

    if (isset($_POST['upp'])) {
        $id_s = $uuid;
        $idss = $_POST['id'];
        $nominal = preg_replace("/[^0-9]/", "", $_POST['nominal']);
        $tgl_bayar = $_POST['tgl_bayar'];
        $via = $_POST['via'];
        $asal = $cek_byr['jml'] - preg_replace("/[^0-9]/", "", $_POST['asal']);

        $jml_bayar = $nominal +  $asal;


        if ($jml_bayar > $tang['jml']) {
            echo "
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Maaf',
                            text: 'Pembayaran Anda Melebihi Ambang Batas!'
                        });
                    </script>
                    ";
        } else {
            $sql = mysqli_query($conn, "UPDATE regist SET nominal = '$nominal', tgl_bayar = '$tgl_bayar', via = '$via' WHERE id_regist = '$idss' ");

            if ($sql) {
                echo "
                    <script>
                            Swal.fire({
                                title: 'Berhasil',
                                text: 'Pembayaran Berhasil Diupdate',
                                icon: 'success',
                                showConfirmButton: false
                            });
                            var millisecondsToWait = 1000;
                            setTimeout(function() {
                                document.location.href = 'bayar_regist.php?id=" . $id . "'
                            }, millisecondsToWait);
                        </script>
                    ";
            }
        }
    }


    ?>