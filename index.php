
<?php
$tasks = [
    1 => ["Рекурсивное возведение в степень", "Функция power()"],
    2 => ["Текущее время", "Правильные склонения часов и минут"],
    3 => ["Цикл while", "Числа от 0 до 100, кратные трём"],
    4 => ["Цикл do...while", "Чётные и нечётные числа"],
    5 => ["Цикл for", "Вывод чисел с пустым телом цикла"],
    6 => ["Массивы областей", "Области и соответствующие города"],
    7 => ["Фильтрация городов", "Города, начинающиеся с буквы К"],
    8 => ["Транслитерация", "Преобразование русских букв в латинские"],
    9 => ["Транслитерация строк", "Замена пробелов на подчёркивания"],
    10 => ["PHP-калькулятор", "Арифметические операции через POST"],
    11 => ["Загрузка файлов", "Отправка файлов на сервер"]
];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Лабораторная №7 — PHP</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header class="site-header">
        <div class="container">
            <p class="eyebrow">WEB-программирование · Вариант №1</p>
            <h1>Лабораторная работа №7</h1>
            <p>Основы протокола HTTP и серверных скриптов на PHP</p>
        </div>
    </header>

    <main class="container">
        <h2>Практические задания</h2>
        <p class="description">
            Выполнено 11 заданий на PHP: рекурсия, циклы,
            массивы, функции, обработка форм и загрузка файлов.
        </p>

        <div class="task-grid">
            <?php foreach ($tasks as $number => $task): ?>
                <article class="task-card">
                    <span class="task-number">
                        Задание №<?= $number ?>
                    </span>

                    <h3><?= htmlspecialchars($task[0]) ?></h3>
                    <p><?= htmlspecialchars($task[1]) ?></p>

                    <a class="task-link"
                       href="task<?= $number ?>.php">
                        Открыть задание
                    </a>
                </article>
            <?php endforeach; ?>
        </div>
    </main>

    <footer class="site-footer">
        Лабораторная работа №7 · PHP · 2026
    </footer>
</body>
</html>
