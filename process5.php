<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $date = trim($_POST['date']);
    $time = trim($_POST['time']);

    $errors = [];

    // Честно Признаюсь, Сравнение Введённой Даты и Времени с Текущими Датой и Временем Была Сделана Благодаря Нейронным Связям (▀̿Ĺ̯▀̿ ̿)
    date_default_timezone_set('Asia/Yekaterinburg'); // Укажите ваш часовой пояс
    $CurDate = date('Y-m-d');
    $CurTime = date('H:i');

    if (empty($name)) {
        $errors[] = 'Имя Обязательно';
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $errors[] = "В Имени Допускается Использовать Только Символы Латинского Алфавита и Пробел";
    }
    if (empty($date)) {
        $errors[] = "Дата Бронирования Обязательна";
    } elseif (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $date)) {
        $errors[] = "Неверный Формат Даты";
    } elseif ($date<$CurDate) {
        $errors[] = "Вперёд в Прошлое Захотели? (по Дате)";
    }
    if (empty($time)) {
        $errors[] = "Время Бронирования Обязательно";
    } elseif (!preg_match("/^\d{2}:\d{2}$/", $time)) {
        $errors[] = "Неверный Формат Времени";
    } elseif ($time<$CurTime) {
        $errors[] = "Вперёд в Прошлое Захотели? (по Времени)";
    }
    if (empty($errors)) {
        $name = htmlspecialchars($name);
        $date = htmlspecialchars($date);
        $time = htmlspecialchars($time);
        print('<h1>Данные Смертного для Бронирования Места в Аду</h1>');
        print("Имя: {$name}<br>");
        print("Дата: {$date}<br>");
        print("Время: {$time}<br>");
    } else {
        foreach ($errors as $error) {
            print("<p style='color: red; font-size:24px;'><strong>{$error}</strong></p>");
        }
    }
}
?>
