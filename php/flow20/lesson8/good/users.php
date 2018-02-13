<?php
require_once 'functions.php';

if(!isAdmin()) {
    echo 'Вам доступ запрещен!';
    die;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Пользователи</title>
</head>
<body>
    <table class="table table-bordered" >
        <tr>
            <th>Имя</th>
            <th>Логин</th>
            <th>Админ</th>
        </tr>
    <? foreach (getUsers() as $user): ?>
        <tr>
            <td><?= $user['username'] ?></td>
            <td><?= $user['login'] ?></td>
            <td><?= $user['is_admin'] ? 'Да' : 'Нет' ?></td>
        </tr>
    <? endforeach; ?>
    </table>
</body>
</html>
