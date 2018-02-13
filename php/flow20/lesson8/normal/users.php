<?php
session_start();
if(empty($_SESSION['user']) || $_SESSION['user']['is_admin'] != 1) {
    echo 'Вам доступ запрещен!';
    die;
}
$fileData = file_get_contents(__DIR__ . '/users.json');
$users = json_decode($fileData, true);
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
    <? foreach ($users as $user): ?>
        <tr>
            <td><?= $user['username'] ?></td>
            <td><?= $user['login'] ?></td>
            <td><?= $user['is_admin'] ? 'Да' : 'Нет' ?></td>
        </tr>
    <? endforeach; ?>
    </table>
</body>
</html>
