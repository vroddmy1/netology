<?php
    require_once 'functions.php';
    $errors = [];
    if (isPost()) {
        if(!checkCaptcha(getParamPost('captcha'))) {
            $errors[] = 'Неверно введены символы с каптчи';
        } else {
            cleanCaptcha();
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
</head>
<body>
<ul>
<?php foreach ($errors as $error): ?>
    <li><?= $error ?></li>
<?php endforeach; ?>
</ul>

<?php if(isPost() && empty($errors)): ?>
    <b>Форма прошла валидацию!</b>
<?php else: ?>
    <form method="POST">
        <label for="name">Имя</label>
        <input id="name" name="name"> <br/>

        <label for="age">Возраст</label>
        <input id="age" name="age"><br/>

        <!-- картинка капчи -->
        <img src="captcha.php">
        <a href="captcha.php?download=1" >Скачать капчу</a><br/>
        <label for="captcha">Введите текст с картинки</label>
        <input id="captcha" name="captcha"><br/>

        <button type="submit">Отправить</button>
    </form>
<?php endif; ?>
</body>
</html>