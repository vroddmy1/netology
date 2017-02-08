<?php
require_once 'functions.php';
    if (isPost() && login(getParamPost('login'), getParamPost('password'))) {
        header('Location: /8/form.php');
        die;
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
</head>
<body>
<?php if (isAdmin()): ?>
    Добро пожаловать в административную чайсть сайта.
<?php else: ?>
    <form method="POST">
        <label for="login">Логин</label>
        <input type="text" name="login" id="login">
        <label for="password">Пароль</label>
        <input type="password" name="password" id="password">

        <button type="submit">Отправить</button>
    </form>
<?php endif; ?>
</body>
</html>