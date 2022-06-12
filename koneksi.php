<?php

$conn = mysqli_connect("localhost", "root", "", "psb22");
// $conn = mysqli_connect("localhost", "u9048253_dwk", "PesantrenDWKIT2021", "u9048253_psb22");

include 'vendor/autoload.php';

use Ramsey\Uuid\Uuid;

$uuid = Uuid::uuid4()->toString();
