<!-- <script src="vendor/sw/sweetalert2.all.min.js"></script> -->
<script src="../bunda/vendor/sw/sweetalert2.all.min.js"></script>
<?php
include 'koneksi.php';
include '../bunda/foot.php';

$id = $_GET['id'];
$kd = $_GET['kd'];

if ($kd == 'hpend') {
    $sql = mysqli_query($conn, "DELETE FROM bp_daftar WHERE id_bayar = '$id' ");
    if ($sql) {
        echo "
        
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Data telah dihapus',
                showConfirmButton: false
            });
            var millisecondsToWait = 1000;
            setTimeout(function() {
                document.location.href = 'daftar.php'
            }, millisecondsToWait);
        </script>
        ";
    }
}
if ($kd == 'tgn') {
    $sql = mysqli_query($conn, "DELETE FROM tanggungan WHERE id_tgn = '$id' ");

    if ($sql) {
        echo "
        
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Data telah dihapus',
                showConfirmButton: false
            });
            var millisecondsToWait = 1000;
            setTimeout(function() {
                document.location.href = 'regist.php'
            }, millisecondsToWait);
        </script>
        ";
    }
}

if ($kd == 'kos') {
    $sql = mysqli_query($conn, "DELETE FROM dekos WHERE id_kos = '$id' ");

    if ($sql) {
        echo "
        
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Data telah dihapus',
                showConfirmButton: false
            });
            var millisecondsToWait = 1000;
            setTimeout(function() {
                document.location.href = 'dekos.php'
            }, millisecondsToWait);
        </script>
        ";
    }
}

if ($kd == 'rgs') {
    $rgs = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM regist WHERE id_regist = '$id' "));
    $nis = $rgs['nis'];
    $tgn = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tanggungan WHERE nis = '$nis' "));
    $id_call = $tgn['id_tgn'];
    $sql = mysqli_query($conn, "DELETE FROM regist WHERE id_regist = '$id' ");

    if ($sql) {
        echo "
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Data telah dihapus',
                showConfirmButton: false
            });
            var millisecondsToWait = 1000;
            setTimeout(function() {
                document.location.href = 'bayar_regist.php?id=" . $id_call . "'
            }, millisecondsToWait);
        </script>
        ";
    }
}
