
<?php
function power($val, $pow) {
    if ($pow == 0) {
        return 1;
    }

    if ($pow < 0) {
        if ($val == 0) {
            return null;
        }

        return 1 / power($val, -$pow);
    }

    return $val * power($val, $pow - 1);
}

$number = 2;
$exponent = 5;
$result = power($number, $exponent);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 1 — Рекурсия</title>
</head>
<body>
    <h1>Задание №1 — Возведение в степень</h1>

    <p>Число: <?= $number ?></p>
    <p>Степень: <?= $exponent ?></p>
    <p>Результат: <?= $result ?? 'Не определён' ?></p>

    <a href="index.php">На главную</a>
</body>
</html>
