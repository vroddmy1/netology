<?php
    require_once 'core/core.php';
    if (!isAuthorized()) {
        redirect('login');
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Админка</title>
</head>
<body>
    Добро пожаловать, <?= getAuthorizedUser()['username'] ?> <br />
    <a href="/generator.php" >Генератор паролей (MD5)</a> <br />
    <a href="/user_add.php" >Добавление нового пользователя</a> <br />
    <a href="/logout.php" >Выйти</a> <br />
</body>
</html>