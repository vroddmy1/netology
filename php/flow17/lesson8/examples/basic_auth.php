<?php
define('ADMIN_LOGIN', 'admin');
define('ADMIN_PASS', 'pass');
// Проверяем что вохдящие данные не пустые и они корректны
if (empty($_SERVER['PHP_AUTH_PW']) || empty($_SERVER['PHP_AUTH_USER']) || ADMIN_LOGIN != $_SERVER['PHP_AUTH_USER'] || ADMIN_PASS != $_SERVER['PHP_AUTH_PW']) {
    // Если они пустые или некорректные, тогда опять выводим диалоговое окно с логином и паролем
    header('WWW-Authenticate: Basic realm="myRealm"');
    die;
}

echo 'Добро пожаловать, ' . ADMIN_LOGIN;

