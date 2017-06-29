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
    <title>Административная часть</title>
</head>
<body>
    Добро пожаловать, <b><?= getCurrentUser()['name'] ?></b><br />
    <a href="logout.php">Выход</a><br />
    <a href="generator.php">Генератор хэшей</a><br />
</body>
</html>