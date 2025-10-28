<?php
$errors = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'validate.inc';

    validateName($errors, $_POST, 'nama');
    validateEmail($errors, $_POST, 'email');
    validatePassword($errors, $_POST, 'password');
    validateAge($errors, $_POST, 'usia');
    validateDateOfBirth($errors, $_POST, 'tgl_lahir');

    if ($errors) {
        echo "<h3>Terjadi kesalahan:</h3><ul>";
        foreach ($errors as $field => $error) {
            echo "<li><strong>$field:</strong> $error</li>";
        }
        echo "</ul>";
        include 'form.inc';
    } else {
        echo "<h3>Data berhasil divalidasi!</h3>";
        echo "Nama: " . htmlspecialchars($_POST['nama']) . "<br>";
        echo "Email: " . htmlspecialchars($_POST['email']) . "<br>";
        echo "Usia: " . htmlspecialchars($_POST['usia']) . "<br>";
        echo "Tanggal Lahir: " . htmlspecialchars($_POST['tgl_lahir']) . "<br>";
    }
} else {
    include 'form.inc';
}
?>
