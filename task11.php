
<?php
$message = "";
$uploadedName = "";
$success = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (
        !isset($_FILES["userfile"]) ||
        $_FILES["userfile"]["error"] !== UPLOAD_ERR_OK
    ) {
        $message = "Ошибка загрузки файла.";
    } else {
        $file = $_FILES["userfile"];
        $maxSize = 5 * 1024 * 1024;

        $allowedTypes = [
            "image/jpeg" => "jpg",
            "image/png" => "png",
            "image/webp" => "webp",
            "text/plain" => "txt",
            "application/pdf" => "pdf"
        ];

        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $mimeType = $finfo->file($file["tmp_name"]);

        if ($file["size"] > $maxSize) {
            $message = "Файл слишком большой. Максимум 5 МБ.";
        } elseif (!isset($allowedTypes[$mimeType])) {
            $message = "Недопустимый тип файла.";
        } else {
            $extension = $allowedTypes[$mimeType];

            // Генерируем безопасное уникальное имя
            $newName = bin2hex(random_bytes(12)) . "." . $extension;

            $uploadDir = __DIR__ . "/uploads/";
            $destination = $uploadDir . $newName;

            if (move_uploaded_file(
                $file["tmp_name"],
                $destination
            )) {
                $success = true;
                $uploadedName = basename($file["name"]);
                $message = "Файл успешно загружен!";
            } else {
                $message = "Не удалось сохранить файл.";
            }
        }
    }
}

function escapeText($text) {
    return htmlspecialchars(
        (string) $text,
        ENT_QUOTES,
        "UTF-8"
    );
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Задание 11 — Загрузка файлов</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f3f6fb;
            padding: 30px;
        }

        .upload-box {
            max-width: 500px;
            margin: 30px auto;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 18px #00000015;
        }

        h1 {
            margin-top: 0;
        }

        input {
            display: block;
            margin: 20px 0;
            max-width: 100%;
        }

        button {
            padding: 12px 22px;
            border: none;
            border-radius: 7px;
            background: #3158a7;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background: #234480;
        }

        .message {
            margin-top: 20px;
            padding: 15px;
            background: #ffe5e5;
            border-radius: 8px;
        }

        .success {
            background: #dcfce7;
        }

        a {
            display: inline-block;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="upload-box">
        <h1>Загрузка файла на сервер</h1>

        <p>
            Выберите JPG, PNG, WEBP, TXT или PDF.
            Максимальный размер — 5 МБ.
        </p>

        <form
            method="POST"
            enctype="multipart/form-data"
        >
            <input
                type="file"
                name="userfile"
                accept=".jpg,.jpeg,.png,.webp,.txt,.pdf"
                required
            >

            <button type="submit">
                Загрузить файл
            </button>
        </form>

        <?php if ($message !== ""): ?>
            <div class="message <?= $success ? 'success' : '' ?>">
                <strong><?= escapeText($message) ?></strong>

                <?php if ($success): ?>
                    <p>
                        Имя загруженного файла:
                        <?= escapeText($uploadedName) ?>
                    </p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <a href="index.php">← На главную</a>
    </div>

</body>
</html>
