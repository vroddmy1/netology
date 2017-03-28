<?php
require_once 'functions.php';

if (!isLogged()) {
    redirect('/8/auth.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h2>Добро пожаловать, <?= getLoggedUser()['name'] ?></h2>
    <a href="/8/logout.php">Выйти</a>
</body>
</html>
