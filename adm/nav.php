<?php
// include "koneksi.php";
session_start();
include 'koneksi.php';

if (!isset($_SESSION['lvl_adm_qwertyuiop'])) {
    echo "
    <script>
    alert('Anda tidak bisa mengakses halaman ini. Silahkan login kembali')
        document.location.href = '../login.php';
    </script>
    ";
}

$id = $_SESSION['id'];
$user = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id' "));

?>
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="img/gue.png" alt=""><?= $user['nama'] ?>
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="javascript:;"> Profile</a></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>

<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Admin PSB '22</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="img/gue.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2><?= $user['nama'] ?></h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a href="index.php"><i class="fa fa-home"></i> Home </a></li>
                    <?php if ($user['level'] == 'super') { ?>
                        <li><a href="akun.php"><i class="fa fa-trash"></i> Aktivasi </a></li>
                    <?php } ?>
                    <li><a><i class="fa fa-user"></i> Data Santri <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="santri.php">Santri Baru</a></li>
                            <li><a href="santri2.php">Santri Lanjutan</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-university"></i> Kamar Santri <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="km_pa.php">Asrama Putra</a></li>
                            <li><a href="km_pi.php">Asrama Putri</a></li>
                            <li><a href="km_data.php">Data Penempatan</a></li>
                        </ul>
                    </li>
                    <li><a href="berkas.php"><i class="fa fa-clone"></i> Berkas pendaftaran </a></li>
                    <li><a><i class="fa fa-money"></i> Registrasi Santri <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="daftar.php">Bayar pendaftaran</a></li>
                            <li><a href="regist.php">Registrasi Ulang</a></li>
                            <li><a href="dekos.php">Dekosan</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-file-image-o"></i> Foto Santri <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="foto.php">Data Foto</a></li>
                            <li><a href="galery.php">Lihat Galery</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-download"></i> Rekap Data <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="rekap_b.php">Santri Baru</a></li>
                            <li><a href="rekap_l.php">Santri Lanjutan</a></li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>