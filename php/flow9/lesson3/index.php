<?php
 require_once 'functions.php';
 $errors = [];
 if (isPOST()) {
     if(!checkCaptcha(getParam('captcha'))) {
         $errors[] = 'Неверный код';
     } else {
         echo 'Ваши даныне успешно сохранены в базу';
         die;
     }
 }
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Форма</title>
</head>
<body>
    <ul>
    <? foreach ($errors as $error): ?>
        <li><?= $error ?></li>
    <? endforeach; ?>
    </ul>

    <form method="post">
        <label for="email">Email</label>
        <input id="email" type="text" name="email" /><br />
        <img src="captcha.php" /><br />
        <label for="captcha">Введите код с картинки</label><br />
        <input id="captcha" type="text" name="captcha" /><br />
        <button type="submit">Отправить</button>
    </form>
</body>
</html>