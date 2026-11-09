
<?php
function describeNumbers() {
    $result = [];
    $i = 0;

    do {
        if ($i == 0) {
            $description = "это ноль";
        } elseif ($i % 2 == 0) {
            $description = "чётное число";
        } else {
            $description = "нечётное число";
        }

        $result[] = "$i — $description";
        $i++;
    } while ($i <= 10);

    return $result;
}

$numbers = describeNumbers();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 4 — Цикл do while</title>
</head>
<body>
    <h1>Задание №4 — Чётные и нечётные числа</h1>

    <?php foreach ($numbers as $item): ?>
        <p><?= $item ?></p>
    <?php endforeach; ?>

    <a href="index.php">На главную</a>
</body>
</html>
