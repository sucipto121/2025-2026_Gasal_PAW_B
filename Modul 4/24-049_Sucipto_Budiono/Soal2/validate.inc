<?php
function validateName(&$errors, $field_list, $field_name)
{
    $pattern = "/^[a-zA-Z'-]+$/";

    if (!isset($field_list[$field_name]) || trim($field_list[$field_name]) === '') {
        $errors[$field_name] = 'required'; 
    } 
    else if (!preg_match($pattern, $field_list[$field_name])) {
        $errors[$field_name] = 'invalid'; 
    }
}
?>
<form method="post" action="form.php">
    <label for="surname">Surname:</label><br>
    <input type="text" id="surname" name="surname"
           value="<?php echo isset($_POST['surname']) ? htmlspecialchars($_POST['surname']) : ''; ?>"><br><br>

    <label for="email">Email:</label><br>
    <input type="text" id="email" name="email"
           value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"><br><br>

    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password"><br><br>

    <button type="submit">Kirim</button>
</form>
