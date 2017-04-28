<?php
require_once 'core.php';
if (!isAuthorized()) {
    location('login');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Админ панель</title>
</head>
<body>
    Добро пожаловать, <?= getLoggedUserData()['name']  ?><br  />
    <a href="index.php">Главная</a><br  />
    <a href="generator.php">Пример MD5</a><br  />
    <a href="logout.php">Выход</a>

</body>
</html>