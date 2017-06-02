<?php
require_once 'core/functions.php';
if (!isAuthorized()) {
    redirect('login');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Адмнистративная часть</title>
</head>
<body>
    Добро пожаловать, <?= getAuthorizedUser()['name'] ?><br />
    <a href="/admin/generator.php">Генератор паролей.</a><br />
    <a href="/admin/logout.php">Выход</a>
</body>
</html>
