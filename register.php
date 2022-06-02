<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="bunda/img/logo/logo.png" rel="icon">
  <title>RuangAdmin - Register</title>
  <link href="bunda/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="bunda/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="bunda/css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
  <!-- Register Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Daftar akun baru</h1>
                  </div>
                  <form action="" method="post">
                    <div class="form-group">
                      <label>Nama Lengka</label>
                      <input type="text" name="nama" class="form-control" required id="exampleInputFirstName" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                      <label>Jabatan</label>
                      <input type="text" name="jabatan" class="form-control" required id="exampleInputLastName" placeholder="Jabatan dalam kepanitiaan">
                    </div>
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" name="username" class="form-control" required id="exampleInputEmail" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="password" class="form-control" required id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label>Konfirmasi Password</label>
                      <input type="password" name="r_password" class="form-control" required id="exampleInputPasswordRepeat" placeholder="Ulangi Password">
                    </div>
                    <div class="form-group">
                      <label>No HP</label>
                      <input type="text" name="hp" class="form-control" required id="exampleInputPasswordRepeat" placeholder="Masukan NO WA Aktif">
                    </div>
                    <div class="form-group">
                      <button type="submit" name="daftar" class="btn btn-primary btn-block">Register</button>
                    </div>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="login.php">Sudah punya akun ?</a>
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Register Content -->
  <script src="bunda/vendor/jquery/jquery.min.js"></script>
  <script src="bunda/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="bunda/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="bunda/js/ruang-admin.min.js"></script>
  <script src="bunda/vendor/sw/sweetalert2.all.min.js"></script>
</body>

</html>

<?php
include 'koneksi.php';
require 'bunda/libs/vendor/autoload.php';

use Ramsey\Uuid\Uuid;

$uuid = Uuid::uuid4()->toString();
if (isset($_POST['daftar'])) {

  $id = $uuid;
  $nama = htmlspecialchars(mysqli_real_escape_string($conn, strtoupper($_POST['nama'])));
  $jabatan = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['jabatan']));
  $username = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['username']));
  $password = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['password']));
  $password2 = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['r_password']));
  $ps = password_hash($password, PASSWORD_DEFAULT);
  $hp = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['hp']));

  $pesan = '
  *Pemberitahuan*
  
  Ada admin daftar baru atas :
  
  *Nama : ' . $nama . '*
  
  _Segera cek_';

  $cek_user = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' "));
  if ($cek_user >= 1) {
    echo "
      <script>
        Swal.fire({
          icon: 'error',
          title: 'Maaf',
          text: 'Username ini sudah digunakan'
        });
      </script>
      ";
  } else {
    if ($password != $password2) {
      echo "
    <script>
        Swal.fire({
          icon: 'error',
          title: 'Maaf',
          text: 'Konfimasi password tidak sama'
        });
    </script>
    ";
    } else {
      $sql = mysqli_query($conn, "INSERT INTO user VALUES ('$id', '$nama','$username','$ps', '', 'T', '$jabatan', '$hp') ");

      if ($sql) {
        echo "
        <script>
        Swal.fire({
          icon: 'success',
          title: 'Berhasil',
          text: 'Akun anda berhasil ditambahkan. aktivasi akun anda akan dikirim via WhatsApp'
        });
        var millisecondsToWait = 2500;
          setTimeout(function() {
          document.location.href = 'login.php'
        }, millisecondsToWait);
        </script>
        ";
        $url = 'https://app.whacenter.com/api/send';
        $ch = curl_init($url);
        // $pesan = $pesan;
        $data = array(
          'device_id' => '42e589d874de10923bb28bbfdc11faab',
          'number' => '085236924510',
          'message' => $pesan,

        );
        $payload = $data;
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
      }
    }
  }
}
?>