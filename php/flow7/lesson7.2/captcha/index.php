<?php
require 'functions.php';
$clientIp = getClientIp();
if (isPOST() && !checkCaptcha(getParam('captcha'))) {
    die('Невалидный код.');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <? if(isPOST()): ?>
        Вы "реальный" человек!
    <? else: ?>
        <form method="post">
            <label for="login">Логин</label>
            <input id="login" name="login"><br/>
            <img src="captcha.php" /><br/>
            <input id="captcha" name="captcha"><br/>
            <button type="submit">Отправить</button>
        </form>
    <? endif; ?>
</body>
</html>