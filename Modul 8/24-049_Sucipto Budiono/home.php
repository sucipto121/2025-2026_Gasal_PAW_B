<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php?err=Silakan login terlebih dahulu");
    exit;
}

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<style>
body{font-family:Arial;margin:0}
.nav{background:#2e73b8;color:white;padding:12px;}
.nav a{color:white;margin-right:12px;text-decoration:none}
.right{float:right}
.container{padding:20px}
</style>
</head>
<body>

<div class="nav">
    <?php if($user['level'] == 1): ?>
        <a href="home.php">Home</a>
        <a href="data_master.php">Data Master</a>
        <a href="transaksi.php">Transaksi</a>
        <a href="laporan.php">Laporan</a>
    <?php else: ?>
        <a href="home.php">Home</a>
        <a href="transaksi.php">Transaksi</a>
        <a href="laporan.php">Laporan</a>
    <?php endif; ?>

    <span class="right">
        Halo, <?= htmlspecialchars($user['nama']) ?> |
        <a href="logout.php" style="color:white;">Logout</a>
    </span>
    <div style="clear:both;"></div>
</div>

<div class="container">
    <h2>Selamat datang, <?= htmlspecialchars($user['nama']) ?></h2>
    <p>Ini halaman Home.</p>
</div>

</body>
</html>
