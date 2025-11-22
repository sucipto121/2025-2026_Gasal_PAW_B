<?php
session_start();
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login.php");
    exit;
}

$username = trim($_POST['username']);
$password = md5($_POST['password']);

$stmt = $mysqli->prepare("SELECT id, username, nama, level FROM user WHERE username=? AND password=? LIMIT 1");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$res = $stmt->get_result();

if ($res->num_rows === 1) {
    $_SESSION['user'] = $res->fetch_assoc();
    header("Location: home.php");
    exit;
} else {
    header("Location: login.php?err=Username atau password salah");
    exit;
}
