<?php
session_start();
include 'functions/common.php';
if (isPOST() && !isAdmin()) {
    $isSuccess = login(getQueryParam('login'), getQueryParam('password'));
    if (!$isSuccess) {
        http_response_code(401);
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
</head>
<body>
<? if (!isAdmin()): ?>
    <? if (isPOST() && empty($isSuccess)): ?>
        <div style="color: red;">Не удалось авторизоваться. Неверный логин или пароль.</div>
    <? endif; ?>
<form action="" method="post">
    <div>
        <label for="login">Логин</label>
        <input id="login" name="login"/>
    </div>
    <div>
        <label for="password">Пароль</label>
        <input id="password" name="password"/>
    </div>
    <div>
        <input type="checkbox" name="save_me"/>
    </div>

    <div>
        <button type="submit">Отправить</button>
    </div>
</form>
<? else: ?>
    Добро пожаловать, <?= getAdminName(); ?>!<br/>
    <a href="logout.php">Выйти</a>

<? endif; ?>
</body>
</html>