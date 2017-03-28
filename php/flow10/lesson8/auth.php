<?php
require_once 'functions.php';

if (isLogged()) {
    redirect('/8/admin.php');
}

$errors = [];
if (isPost()) {
    if(login(getParamPost('login'), getParamPost('password'))) {
        redirect('/8/admin.php');
    } else {
        $errors[] = 'Неверный логин или пароль.';
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Session Auth Example</title>
</head>
<body>
    <ul>
    <?php foreach ($errors as $error): ?>
        <li><?= $error ?></li>
    <?php endforeach; ?>
    </ul>
    <?php if (!isLogged()): ?>
        <form method="POST">
            <label for="login"></label>
            <input type="text" value="<?= (string)getParamPost('login') ?>" name="login" id="login">
            <label for="password"></label>
            <input type="password" value="<?= (string)getParamPost('password') ?>" name="password" id="password">
            <button type="submit">Войти</button>
        </form>
    <?php endif; ?>
</body>
</html>