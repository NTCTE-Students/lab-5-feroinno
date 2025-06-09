<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $password = trim($_POST['password']);
    $subpassword = trim($_POST['subpassword']);
    
    $errors = [];

    if (empty($name)) {
        $errors[] = 'Имя обязательно';
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $errors[] = "В имене допускается использовать только символы латинского алфавита и пробел";
    }
    
    if (empty($password)) {
        $errors[] = "Пароль обязателен";
    }
    if (empty($subpassword)) {
        $errors[] = "Подтверждение пароля обязательно";
    }
    if ($password!==$subpassword) {
        $errors[] = "Пароли не совпадают";
    }
    
    if (empty($errors)) {
        $name = htmlspecialchars($name);
        $subpassword = htmlspecialchars($subpassword);
        
        print('<h1>Данные обработаны</h1>');
        print("Имя: {$name}<br>");
        print("Ваш Никому Не Нужный Пароль: {$subpassword}<br>");
    } else {
        foreach ($errors as $error) {
            print("<p style='color: red;'>{$error}</p>");
        }
    }
}
?>
