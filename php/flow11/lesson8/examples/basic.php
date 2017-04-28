<?php
require_once 'functions.php';
if (!isset($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) ||  !basicLogin($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW'])) {
    header('WWW-Authenticate: Basic realm="myRealm"');
    die;
} ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Basic Auth</title>
</head>
<body>
    <b>Добро пожаловать в Админ панель!</b>
</body>
</html>