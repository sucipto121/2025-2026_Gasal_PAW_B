<?php
$host = 'localhost';
$user = 'root';     
$pass = '';         
$db   = 'laporan_penjualan'; 

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>