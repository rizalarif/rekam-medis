<?php
$host = "localhost";
$user = "root";
$password = "";
$database   = "rekam_medis";
    
$koneksi = mysqli_connect($host, $user, $password);
mysqli_select_db($koneksi, "rekam_medis");
?>
