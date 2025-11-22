<?php
session_start();
$_SESSION = [];
session_destroy();
header('Location: login.php?err=' . urlencode('Anda telah logout'));
exit;
