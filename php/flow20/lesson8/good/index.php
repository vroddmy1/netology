<?php
require_once 'functions.php';

if(!isAuthorized()) {
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
    <h3>Добро пожаловать,  <?= $_SESSION['user']['username']; ?></h3>
    <ul>
        <li><a href="logout.php" >Выйти</a></li>
        <? if ($_SESSION['user']['is_admin'] == 1): ?>
            <li><a href="users.php" >Пользователи</a></li>
        <? endif; ?>
    </ul>
</body>
</html>


