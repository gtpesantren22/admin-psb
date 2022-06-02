<?php
session_start();
require 'function.php';

if (isset($_POST["go"])) {

    $username = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['username']));
    $password = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['password']));

    $dt = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' ");

    if (mysqli_num_rows($dt) == 1) {
        $row = mysqli_fetch_assoc($dt);
        if ($row["password"] == $password) {
            //set session
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id_user"];
            $_SESSION["level"] = $row["level"];

            if ($_SESSION['level'] == 'adm' || $_SESSION['level'] == 'ss') {
                echo "
                <script>
                    document.location.href = 'admin/index.php';
                </script>
            ";
                exit;
            } else {
                echo "
                <script>
                    document.location.href = 'lembaga/index.php';
                </script>
            ";
                exit;
            }
        } else {
            echo "
                <script>
                    alert('Login Gagal');
                    
                </script>
            ";
        }
    }
    $error = true;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin PSB '21' </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="" method="post">
                        <h1>Login Form</h1>

                        <div>
                            <input type="text" name="username" class="form-control" autofocus="on" placeholder="Username" required="" />
                        </div>
                        <div>
                            <input type="password" name="password" class="form-control" placeholder="Password" required="" />
                        </div>
                        <div>
                            <button type="submit" class="btn btn-sm btn-success" name="go">Log In</button>
                            <a class="reset_pass" href="#">Lost your password?</a>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <!-- <p class="change_link">New to site?
                                <a href="#signup" class="to_register"> Create Account </a>
                            </p> -->

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-paw"></i> Administrator PSB '21</h1>
                                <p>©2021 PSB PPDWK. PonPes Darul Lughah Wal Karomah</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>

</html>