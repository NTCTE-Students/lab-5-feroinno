<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name=trim($_POST['name']);
    $email=trim($_POST['email']);
    $message=trim($_POST['message']);

    $errors==[];

    if (empty($name)) {
        $errors[] = 'Имя Обязательно';
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $errors[] = "В Имене Допускается Использовать Только Символы Латинского Алфавита и Пробел";
    }
    if (empty($email)) {
        $errors[] = "Электронная почта Обязательна";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "У электронной Почты Некорректный Формат";
    }
    if (empty($message)) {
        $errors[] = "Сообщение Обязательно";
    } elseif (mb_strlen($message) <= 9) {
        $errors[] = "Сообщение Должно Содержать НЕ Менее 10 Символов";
    }
    if (empty($errors)) {
        $name=htmlspecialchars($name);
        $email=htmlspecialchars($email);
        $message=htmlspecialchars($message);
        print('<h1>Данные Обработаны</h1>');
        print("Имя: {$name}<br>");
        print("Электронная Почта: {$email}<br>");
        print("Вы Отправили в Пустоту Сообщение: {$message}<br>");
    } else {
        foreach ($errors as $error) {
            print("<p style='color: red;'>{$error}</p>");
        }
    }
}
?>
