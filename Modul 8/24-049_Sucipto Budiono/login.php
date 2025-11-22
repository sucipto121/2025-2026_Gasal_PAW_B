<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: home.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Admin</title>
<style>
body{font-family:Arial;background:#ececec;display:flex;justify-content:center;align-items:center;height:100vh;margin:0;}
.panel{background:#f7f7f7;padding:40px;width:560px;border-radius:4px;box-shadow:0 0 0 #ddd;text-align:center;}
h1{color:#2e73b8;margin-bottom:10px;font-weight:400}
.form-box{width:300px;margin:auto}
input{width:100%;padding:12px;margin-bottom:10px;border:1px solid #ccc;border-radius:4px}
.btn{width:100%;padding:12px;border:none;border-radius:5px;background:linear-gradient(#4ba8ff,#0080ff);color:white;font-size:16px;cursor:pointer}
.error{color:red;margin-bottom:10px}
</style>
</head>
<body>
<div class="panel">
    <h1>Login Admin</h1>
    <div class="form-box">
        <?php if(isset($_GET['err'])): ?>
            <div class="error"><?= htmlspecialchars($_GET['err']) ?></div>
        <?php endif; ?>

        <form action="proses_login.php" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button class="btn" type="submit">Login</button>
        </form>
    </div>
</div>
</body>
</html>
