<?php
include 'koneksi.php';
include 'head.php';

$baru = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS jml FROM tb_santri WHERE ket = 'baru' "));
$lama = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS jml FROM tb_santri WHERE ket = 'lama' "));
$baruV = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS jml FROM tb_santri WHERE ket = 'baru' AND stts = 'Terverifikasi' "));
$lamaV = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS jml FROM tb_santri WHERE ket = 'lama' AND stts = 'Terverifikasi' "));

?>
<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
  </div>

  <div class="row mb-3">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">TOTAL SANTRI</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $baru['jml'] + $lama['jml']; ?> santri</div>
              <div class="mt-2 mb-0 text-muted text-xs">
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> %</span>
                <span>Jumlah santri PSB 2022</span>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-primary"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Earnings (Annual) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">JUMLAH SANTRI BARU</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $baru['jml']; ?> santri</div>
              <div class="mt-2 mb-0 text-muted text-xs">
                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> %</span>
                <span>Jumlah santri PSB 2022</span>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-shopping-cart fa-2x text-success"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- New User Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card h-100">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-uppercase mb-1">JUMLAH SANTRI LAMA</div>
              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $lama['jml']; ?> santri</div>
              <div class="mt-2 mb-0 text-muted text-xs">
                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> %</span>
                <span>Jumlah santri PSB 2022</span>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-info"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-6 mb-4">
      <div class="card bg-success text-white">
        <div class="card-body">
          <div class="text-white-50 small">Jumlah Terverifikasi</div>
          <?= $baruV['jml'] + $lamaV['jml']; ?> santri
        </div>
      </div>
    </div>
    <div class="col-lg-6 mb-4">
      <div class="card bg-danger text-white">
        <div class="card-body">
          <div class="text-white-50 small">Jumlah Belum Terverifikasi</div>
          <?= ($baru['jml'] + $lama['jml']) - ($baruV['jml'] + $lamaV['jml']); ?> santri
        </div>
      </div>
    </div>

    <div class="col-lg-3 mb-4">
      <div class="card bg-primary text-white">
        <div class="card-body">
          <div class="text-white-50 small">Jumlah Terverifikasi Baru</div>
          <?= $baruV['jml']; ?> santri
        </div>
      </div>
    </div>
    <div class="col-lg-3 mb-4">
      <div class="card bg-warning text-white">
        <div class="card-body">
          <div class="text-white-50 small">Jumlah Terverifikasi Lama</div>
          <?= $lamaV['jml']; ?> santri
        </div>
      </div>
    </div>

    <div class="col-lg-3 mb-4">
      <div class="card bg-primary text-white">
        <div class="card-body">
          <div class="text-white-50 small">Jumlah Belum Terverifikasi Baru</div>
          <?= $baru['jml'] - $baruV['jml']; ?> santri
        </div>
      </div>
    </div>
    <div class="col-lg-3 mb-4">
      <div class="card bg-warning text-white">
        <div class="card-body">
          <div class="text-white-50 small">Jumlah Belum Terverifikasi Lama</div>
          <?= $lama['jml'] - $lamaV['jml']; ?> santri
        </div>
      </div>
    </div>

  </div>
  <!--Row-->



  <?php include 'foot.php'; ?>