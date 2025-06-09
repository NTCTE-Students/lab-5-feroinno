<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $password = trim($_POST['password']);
        
    $errors = [];

    if (empty($name)) {
        $errors[] = 'Имя Обязательно';
    } elseif (strlen($name) <= 3) {
        $errors[] = 'Имя Должно Содержать НЕ Менее 4 Символов';
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $errors[] = "В Имене Допускается Использовать Только Символы Латинского Алфавита и Пробел";
    }
    if (empty($password)) {
        $errors[] = "Пароль Обязателен";
    } elseif (mb_strlen($password) <= 7) {
        $errors[] = "Пароль Должен Содержать НЕ Менее 8 Символов";
    }
    
    if (empty($errors)) {
        $name = htmlspecialchars($name);
        $password = htmlspecialchars($password);
        
        print('<h1>Данные Обработаны</h1>');
        print("Имя: {$name}<br>");
        print("Запомни, а то Забудешь: {$password}<br>");
    } else {
        foreach ($errors as $error) {
            print("<p style='color: red;'><strong>{$error}</strong></p>");
        }
    }
}
?>
