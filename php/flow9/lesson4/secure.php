<?php
    require_once 'functions.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Рабочая доска</title>
</head>
<body>
    <b>Добро пожаловать, <?= getUserData()['name'] ?>!</b><br/>
    <a target="_blank" href="secure_1.php">Приватная зона для менеджера</a><br/>
    <a target="_blank" href="secure_2.php">Приватная зона для админа</a><br/>
    <a target="_blank" href="generator.php">Генератор MD5</a><br/>
    <a href="logout.php">Выход</a><br/>
</body>
</html>
