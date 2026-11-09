

<?php
require_once __DIR__ . "/includes/transliterate.php";

$original = "Привет, мир! Я изучаю PHP.";
$result = transliterate($original);
?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 8 — Транслитерация</title>
</head>
<body>
    <h1>Задание №8 — Транслитерация</h1>

    <p>Исходная строка:
        <?= htmlspecialchars($original) ?>
    </p>

    <p>Результат:
        <?= htmlspecialchars($result) ?>
    </p>

    <a href="index.php">На главную</a>
</body>
</html>
