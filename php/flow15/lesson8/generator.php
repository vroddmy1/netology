<?php
require_once 'core/core.php';
if (!isAuthorized()) {
    redirect('login');
}
$hash = null;
if (isPost()) {
    $hash = getHash(getParam('password'));
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Генератор md5</title>
</head>
<body>
    <?php if (!$hash): ?>
    <form method="POST">
        <input type="text" name="password">
        <button type="submit">Сгенерировать</button>
    </form>
    <?php else: ?>
        Для пароля: <?= getParam('password') ?> Хэш: <?= $hash ?>
    <?php endif; ?>
    <a class="btn btn-default" href="/index.php">Назад</a>
</body>
</html>