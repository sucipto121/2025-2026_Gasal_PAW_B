<?php
$server_name = "localhost";
$user_name = "root";
$password = "";
$database_name = "penjualan_db";

$conn = mysqli_connect($server_name, $user_name, $password, $database_name);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>