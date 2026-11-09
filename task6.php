
<?php
$regions = [
    "Московская область" => [
        "Москва", "Зеленоград", "Клин"
    ],
    "Ленинградская область" => [
        "Санкт-Петербург", "Всеволожск",
        "Павловск", "Кронштадт"
    ],
    "Рязанская область" => [
        "Рязань", "Касимов", "Кораблино"
    ]
];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 6 — Массивы</title>
</head>
<body>
    <h1>Задание №6 — Области и города</h1>

    <?php foreach ($regions as $region => $cities): ?>
        <p>
            <strong><?= htmlspecialchars($region) ?>:</strong>
            <?= htmlspecialchars(implode(", ", $cities)) ?>
        </p>
    <?php endforeach; ?>

    <a href="index.php">На главную</a>
</body>
</html>
