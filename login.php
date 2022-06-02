<?php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="bunda/img/logo/logo.png" rel="icon">
  <title>RuangAdmin - Login</title>
  <link href="bunda/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="bunda/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="bunda/css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form class="user" action="" method="post">
                    <div class="form-group">
                      <input type="text" name="namamu" required class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                      <input type="password" name="fiil" required class="form-control" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <select name="tuju" required class="form-control" required>
                        <option value=""> login ke </option>
                        <option value="adm">Admin PSB</option>
                        <option value="bunda">Admin Bendahara</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember
                          Me</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="submit" name="masuk" class="btn btn-primary btn-block">Login</button>
                    </div>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="register.php">Buat akun baru!</a>
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
  <!-- Login Content -->
  <script src="bunda/vendor/jquery/jquery.min.js"></script>
  <script src="bunda/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="bunda/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="bunda/js/ruang-admin.min.js"></script>
  <script src="bunda/vendor/sw/sweetalert2.all.min.js"></script>
</body>

</html>

<?php

if (isset($_POST['masuk'])) {

  $isim = htmlspecialchars(addslashes(mysqli_real_escape_string($conn, $_POST['namamu'])));
  $fiil = htmlspecialchars(addslashes(mysqli_real_escape_string($conn, $_POST['fiil'])));
  $tuju = htmlspecialchars(addslashes(mysqli_real_escape_string($conn, $_POST['tuju'])));

  $sql = mysqli_query($conn, "SELECT * FROM user WHERE username = '$isim' ");
  $cek = mysqli_num_rows($sql);
  $hasil = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE username = '$isim' "));

  if ($cek != 1) {
    echo "
    <script>
    Swal.fire({
      icon: 'error',
      title: 'Maaf',
      text: 'Username anda tidak ditemukan'
    });
        </script>
      ";
  } else {
    if ($hasil['aktif'] == 'T') {
      echo "
    <script>
        Swal.fire({
          icon: 'warning',
          title: 'Maaf',
          text: 'Akun anda belum aktif. Silahkan menghubungi admin'
        });
    </script>
    ";
    } else {
      $dt = mysqli_fetch_assoc($sql);
      $pass = $dt['password'];
      $lvl = $dt['level'];

      if (password_verify($fiil, $pass)) {

        $_SESSION['id'] = $dt['id_user'];

        if ($lvl == 'opr' || $lvl == 'super' && $tuju == 'adm') {
          $_SESSION['lvl_adm_qwertyuiop'] = true;
          $link = 'adm/index.php';
        } elseif ($lvl == 'bunda' || $lvl == 'super' && $tuju == 'bunda') {
          $_SESSION['lvl_bunda_qwertyuiop'] = true;
          $link = 'bunda/index.php';
        }

        echo "
      <script>
            Swal.fire({
                title: 'Berhasil',
                text: 'Login berhasil. Anda akan dialihkan',
                icon: 'success',
                showConfirmButton: false
            });
            var millisecondsToWait = 2000;
            setTimeout(function() {
                document.location.href = '" . $link . "'
            }, millisecondsToWait);
        </script>
      ";
      } else {
        echo "
        <script>
            Swal.fire({
              icon: 'error',
              title: 'Maaf',
              text: 'Password anda salah'
            });
        </script>
        ";
      }
    }
  }
}
?>