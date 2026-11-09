
<?php
require_once __DIR__ . "/includes/transliterate.php";

function transliterateWithUnderscores($text) {
    $result = transliterate($text);
    return str_replace(" ", "_", $result);
}

$original9 = "Я изучаю язык программирования PHP";
$result9 = transliterateWithUnderscores($original9);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 9 — Транслитерация</title>
</head>
<body>
    <h1>Задание №9 — Транслитерация с подчёркиваниями</h1>

    <p>
        Исходная строка:
        <?= htmlspecialchars($original9) ?>
    </p>

    <p>
        Результат:
        <?= htmlspecialchars($result9) ?>
    </p>

    <a href="index.php">На главную</a>
</body>
</html>
