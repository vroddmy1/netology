<?php
require_once 'core/functions.php';
if (!isAuthorized()) {
    redirect('login');
}
if (isPost()) {
    $password = getParam('password');
    echo getPasswordHash($password);
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
    <title>Password hash generator</title>
</head>
<body>
    <form method="post">
        <label for="password">Пароль</label>
        <input id="password" type="text" name="password"><br />
        <button type="submit">Сгенерировать</button>
    </form>
</body>
</html>