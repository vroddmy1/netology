<?php
    $text = isset($_GET['text']) ? $_GET['text'] : 'Привет';
    $asFile = !empty($_GET['as_file']) ? (int)$_GET['as_file'] : 0;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Card</title>
</head>
<body>
    <b>Поздравляю!</b>
    <a target="_blank" href="image.php?text=<?= $text ?>&as_file=<?= $asFile ?>">
        Скачать открытку.
    </a>
    <img src="image.php?text=<?= $text ?>">
</body>
</html>

