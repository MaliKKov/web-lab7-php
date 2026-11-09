
<?php
$first = $_POST["first"] ?? "";
$second = $_POST["second"] ?? "";
$operation = $_POST["operation"] ?? "";

$result = null;
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if ($first === "" || $second === "") {
        $error = "Введите оба числа.";
    } elseif (!is_numeric($first) || !is_numeric($second)) {
        $error = "Введите корректные числа.";
    } else {
        $a = (float) $first;
        $b = (float) $second;

        switch ($operation) {
            case "add":
                $result = $a + $b;
                break;

            case "subtract":
                $result = $a - $b;
                break;

            case "multiply":
                $result = $a * $b;
                break;

            case "divide":
                if ($b == 0) {
                    $error = "На ноль делить нельзя!";
                } else {
                    $result = $a / $b;
                }
                break;

            default:
                $error = "Неизвестная операция.";
        }
    }
}

function safe($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, "UTF-8");
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Задание 10 — PHP-калькулятор</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f6fb;
            padding: 30px;
        }

        .calculator {
            max-width: 450px;
            margin: 30px auto;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 18px #00000015;
        }

        h1 {
            margin-top: 0;
        }

        label {
            display: block;
            margin: 18px 0 7px;
            font-weight: bold;
        }

        input {
            width: 100%;
            box-sizing: border-box;
            padding: 12px;
            border: 1px solid #ccd5e0;
            border-radius: 7px;
        }

        .buttons {
            display: flex;
            gap: 10px;
            margin-top: 20px;
        }

        button {
            flex: 1;
            padding: 13px;
            background: #3158a7;
            color: white;
            border: none;
            border-radius: 7px;
            font-size: 20px;
            cursor: pointer;
        }

        button:hover {
            background: #234480;
        }

        .result {
            margin-top: 25px;
            padding: 15px;
            background: #e8f2ff;
            border-radius: 7px;
        }

        .error {
            background: #ffe5e5;
            color: #b91c1c;
        }

        a {
            display: inline-block;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="calculator">
        <h1>PHP-калькулятор</h1>

        <p>Введите два числа и выберите операцию.</p>

        <form method="POST">
            <label for="first">Первое число</label>
            <input
                type="number"
                step="any"
                id="first"
                name="first"
                value="<?= safe($first) ?>"
                required
            >

            <label for="second">Второе число</label>
            <input
                type="number"
                step="any"
                id="second"
                name="second"
                value="<?= safe($second) ?>"
                required
            >

            <div class="buttons">
                <button name="operation" value="add">+</button>
                <button name="operation" value="subtract">−</button>
                <button name="operation" value="multiply">×</button>
                <button name="operation" value="divide">÷</button>
            </div>
        </form>

        <?php if ($result !== null): ?>
            <div class="result">
                <strong>Результат:</strong>
                <?= safe(round($result, 10)) ?>
            </div>
        <?php endif; ?>

        <?php if ($error !== ""): ?>
            <div class="result error">
                <?= safe($error) ?>
            </div>
        <?php endif; ?>

        <a href="index.php">← На главную</a>
    </div>

</body>
</html>
