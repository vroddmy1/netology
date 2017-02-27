<?php

define('USER_LOGIN', 'admin');
define('USER_PASS', 'pass');

if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
    header('WWW-Authenticate: Basic realm="Abracadabra"');
    die;
}

if (USER_LOGIN != $_SERVER['PHP_AUTH_USER'] || USER_PASS != $_SERVER['PHP_AUTH_PW']) {
    echo 'Неверный логин или пароль';
    header('WWW-Authenticate: Basic realm="Abracadabra"');
    die;
}
?>
<p>Добро пожаловать, <b><?= $_SERVER['PHP_AUTH_USER'] ?></b></p>