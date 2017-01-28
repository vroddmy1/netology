<?php
define('USER', 'admin');
define('PASSWORD', 'admin');
$isAuth = isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']);
$isValidUser = $isAuth && $_SERVER['PHP_AUTH_USER'] == USER && $_SERVER['PHP_AUTH_PW'] == PASSWORD;

if (!$isAuth || !$isValidUser) {
    header('WWW-Authenticate: Basic realm="MySite"');
    echo 'Вам необходимо авторизоваться!';
    die;
}

echo $_SERVER['PHP_AUTH_USER'] . ' вы находитесь в запретной зоне!';

