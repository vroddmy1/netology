<?php
$size = 14;
if(!empty($_COOKIE['text_size'])) {
    $size = (int)$_COOKIE['text_size'];
}
if (!empty($_POST['size'])) {
    $size = (int)$_POST['size'];
    setcookie('text_size', $size, time() + 5);
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Example Cookie</title>
    <style>
        .size {
            font-size: <?= $size ?>px;
        }
    </style>
</head>
<body>
    <form method="post">
        <label for="size" >Размер шрифта</label>
        <select id="size" name="size">
            <option value="14">14</option>
            <option value="20">20</option>
            <option value="32">32</option>
        </select>
        <button type="submit">Применить</button>
    </form>

    <p class="size">Добро пожаловать!</p>
</body>
</html>
