
<?php
ob_start();

for ($i = 0; $i < 10; print($i++ . " ")) {
    // Тело цикла намеренно оставлено пустым
}

$result = ob_get_clean();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 5 — Цикл for</title>
</head>
<body>
    <h1>Задание №5 — Цикл for без тела</h1>

    <p><?= htmlspecialchars($result) ?></p>

    <a href="index.php">На главную</a>
</body>
</html>
