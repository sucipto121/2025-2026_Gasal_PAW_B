<?php
function validateName(&$errors, $field_list, $field_name) {
    $pattern = "/^[a-zA-Z'-]+$/";
    if (!isset($field_list[$field_name]) || empty(trim($field_list[$field_name]))) {
        $errors[$field_name] = 'Nama wajib diisi';
    } elseif (!preg_match($pattern, $field_list[$field_name])) {
        $errors[$field_name] = 'Nama hanya boleh huruf dan tanda - atau \'';
    }
}

function validateEmail(&$errors, $field_list, $field_name) {
    $email = trim($field_list[$field_name]);
    if (empty($email)) {
        $errors[$field_name] = 'Email wajib diisi';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[$field_name] = 'Format email tidak valid';
    }
}

function validatePassword(&$errors, $field_list, $field_name) {
    $password = $field_list[$field_name];
    if (strlen($password) < 6) {
        $errors[$field_name] = 'Password minimal 6 karakter';
    }
}

function validateAge(&$errors, $field_list, $field_name) {
    $age = $field_list[$field_name];
    if (!is_numeric($age)) {
        $errors[$field_name] = 'Usia harus berupa angka';
    } elseif ($age < 17 || $age > 100) {
        $errors[$field_name] = 'Usia tidak masuk akal';
    }
}

function validateDateOfBirth(&$errors, $field_list, $field_name) {
    $dob = $field_list[$field_name];
    $parts = explode('-', $dob);
    if (count($parts) === 3) {
        if (!checkdate($parts[1], $parts[2], $parts[0])) {
            $errors[$field_name] = 'Tanggal lahir tidak valid';
        }
    } else {
        $errors[$field_name] = 'Format tanggal lahir harus YYYY-MM-DD';
    }
}
?>
