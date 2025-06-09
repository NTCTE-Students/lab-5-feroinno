<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    
    $errors = [];

    if (empty($email)) {
        $errors[] = "Электронная Почта Обязательна";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "У Электронной Почты Некорректный Формат";
    }
    
    if (empty($errors)) {
        $email = htmlspecialchars($email);
        
        print('<h1>Данные Обработаны</h1>');
        print("Электронная@Почта: {$email}<br>");
    } else {
        foreach ($errors as $error) {
            print("<p style='color: red; font-size:24px;'><strong>{$error}</strong></p>");
        }
    }
}
?>
