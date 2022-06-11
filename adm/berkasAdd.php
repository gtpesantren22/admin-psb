<?php

require 'function.php';

$nis = $_GET['nis'];

$sql = mysqli_query($conn, "INSERT INTO berkas(nis) VALUES ('$nis') ");

if ($sql) {
    echo "
    <script>
        window.location = 'berkas.php';
    </script>
    ";
}
