<form method="post" action="">
    <label>Nama:</label><br>
    <input type="text" name="nama" value="<?= isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : '' ?>"><br>

    <label>Email:</label><br>
    <input type="text" name="email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>"><br>

    <label>Password:</label><br>
    <input type="password" name="password"><br>

    <label>Usia:</label><br>
    <input type="text" name="usia" value="<?= isset($_POST['usia']) ? htmlspecialchars($_POST['usia']) : '' ?>"><br>

    <label>Tanggal Lahir (YYYY-MM-DD):</label><br>
    <input type="text" name="tgl_lahir" value="<?= isset($_POST['tgl_lahir']) ? htmlspecialchars($_POST['tgl_lahir']) : '' ?>"><br>

    <br><input type="submit" value="Kirim">
</form>
