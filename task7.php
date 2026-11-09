
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

$filteredCities = [];

foreach ($regions as $region => $cities) {
    foreach ($cities as $city) {
        if (preg_match('/^К/u', $city)) {
            $filteredCities[$region][] = $city;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 7 — Фильтрация городов</title>
</head>
<body>
    <h1>Задание №7 — Города на букву К</h1>

    <?php foreach ($filteredCities as $region => $cities): ?>
        <p>
            <strong><?= htmlspecialchars($region) ?>:</strong>
            <?= htmlspecialchars(implode(", ", $cities)) ?>
        </p>
    <?php endforeach; ?>

    <a href="index.php">На главную</a>
</body>
</html>
