<?php
require 'function.php';

$aks = $_GET['aks'];
$id = $_GET['id'];

if ($aks == 'on') {

    $q = mysqli_query($conn, "UPDATE user SET aktif = 'Y' WHERE id_user = '$id' ");

    header("Location: akun.php");
} elseif ($aks == 'off') {

    $q = mysqli_query($conn, "UPDATE user SET aktif = 'T' WHERE id_user = '$id' ");

    header("Location: akun.php");
}
