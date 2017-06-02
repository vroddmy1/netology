<?php
require_once 'core.php';
$errors = [];
if (isPOST()) {
    if (login(getParam('login'), getParam('password'))) {
        location('admin');
    } else {
        $errors[] = 'Неверный логин или пароль.';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Вход</title>
</head>
<body>
<ul>
    <? foreach ($errors as $error): ?>
        <li><?= $error ?></li>
    <? endforeach; ?>
</ul>

<form method="POST">
    <label for="login">Логин</label>
    <input name="login" id="login">

    <label for="password">Пароль</label>
    <input name="password" id="password">

    <button type="submit">Войти</button>
</form>

</body>
</html>