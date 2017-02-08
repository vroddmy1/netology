<?php
require_once 'functions.php';
$errors = [];
if (isAdmin()) {
    location('index');
    die;
}
if (isPost()) {
    if (login(getParamPost('login'), getParamPost('password'))) {
        location('index');
        die;
    } else {
        $errors[] = 'Неверный логин или пароль';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <title>Вход в админку</title>
</head>
<body>
<form method="post">
    <ul>
        <?php foreach ($errors as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach; ?>
    </ul>
    <div class="form-group">
        <label for="login">Логин:</label>
        <input value="<?= getParamPost('login') ?>" name="login" class="form-control" id="login">
    </div>
    <div class="form-group">
        <label for="pwd">Пароль:</label>
        <input name="password" type="password" class="form-control" id="pwd">
    </div>
    <button type="submit" class="btn btn-default">Вход</button>
</form>
</body>
</html>