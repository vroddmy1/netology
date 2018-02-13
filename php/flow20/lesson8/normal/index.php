<?php
session_start();

if(empty($_SESSION['user'])) {
    echo 'Вам доступ запрещен!';
    die;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Админка</title>
</head>
<body>
    <h3>Добро пожаловать,  <?= $_SESSION['user']['username']; ?></h3>
    <ul>
        <li><a href="logout.php" >Выйти</a></li>
        <? if ($_SESSION['user']['is_admin'] == 1): ?>
            <li><a href="users.php" >Пользователи</a></li>
        <? endif; ?>
    </ul>
</body>
</html>


