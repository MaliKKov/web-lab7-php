
<?php
$numbers = [];
$i = 0;

while ($i <= 100) {
    if ($i % 3 == 0) {
        $numbers[] = $i;
    }

    $i++;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 3 — Цикл while</title>
</head>
<body>
    <h1>Задание №3 — Цикл while</h1>

    <p>Числа от 0 до 100, кратные трём:</p>

    <p><?= implode(", ", $numbers) ?></p>

    <a href="index.php">На главную</a>
</body>
</html>
