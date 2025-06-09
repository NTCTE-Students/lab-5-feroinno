<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    
    $errors = [];

    if (empty($name)) {
        $errors[] = 'Имя обязательно';
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $errors[] = "В имене допускается использовать только символы латинского алфавита и пробел";
    }
    
    if (empty($email)) {
        $errors[] = "Электронная почта обязательна";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "У электронной почты некорректный формат";
    }
    
    if (empty($errors)) {
        $name = htmlspecialchars($name);
        $email = htmlspecialchars($email);
        
        print('<h1>Данные обработаны</h1>');
        print("Имя: {$name}<br>");
        print("Электронная почта: {$email}<br>");
    } else {
        foreach ($errors as $error) {
            print("<p style='color: red;'>{$error}</p>");
        }
    }
}