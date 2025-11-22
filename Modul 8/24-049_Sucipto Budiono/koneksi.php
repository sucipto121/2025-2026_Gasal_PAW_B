<?php
$host = "localhost";
$db   = "admin"; 
$user = "root";
$pass = ""; 

$mysqli = new mysqli($host, $user, $pass, $db);
if ($mysqli->connect_errno) {
    die("Gagal koneksi MySQL: " . $mysqli->connect_error);
}
?>
