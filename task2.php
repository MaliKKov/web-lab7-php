
<?php
date_default_timezone_set('Europe/Moscow');
function getWord($number, $forms) {
    $number = abs($number);
    $lastTwo = $number % 100;
    $lastOne = $number % 10;

    if ($lastTwo >= 11 && $lastTwo <= 14) {
        return $forms[2];
    }

    if ($lastOne == 1) {
        return $forms[0];
    }

    if ($lastOne >= 2 && $lastOne <= 4) {
        return $forms[1];
    }

    return $forms[2];
}

function getCurrentTime() {
    $hours = (int) date("G");
    $minutes = (int) date("i");

    $hourWord = getWord(
        $hours,
        ["час", "часа", "часов"]
    );

    $minuteWord = getWord(
        $minutes,
        ["минута", "минуты", "минут"]
    );

    return "$hours $hourWord $minutes $minuteWord";
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 2 — Время</title>
</head>
<body>
    <h1>Задание №2 — Текущее время</h1>

    <p><?= getCurrentTime() ?></p>

    <a href="index.php">На главную</a>
</body>
</html>
