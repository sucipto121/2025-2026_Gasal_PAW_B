<form method="post" action="form.php">
    <label for="surname">Surname:</label><br>
    <input type="text" id="surname" name="surname"
           value="<?php echo isset($_POST['surname']) ? htmlspecialchars($_POST['surname']) : ''; ?>">
    <br><br>
    <button type="submit">Kirim</button>
</form>
