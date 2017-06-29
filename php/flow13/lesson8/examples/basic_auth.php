<?php
define('USER_LOGIN', 'admin');
define('USER_PASS', 'pass');

$isEmptyAuth = empty($_SERVER['PHP_AUTH_USER']) || empty($_SERVER['PHP_AUTH_PW']);
$isIncorrectAuth = USER_LOGIN != $_SERVER['PHP_AUTH_USER'] ||  USER_PASS != $_SERVER['PHP_AUTH_PW'];
if ($isEmptyAuth || $isIncorrectAuth) {
    header('WWW-Authenticate: Basic realm="MyRealm"');
    die;
}

echo 'Добро пожаловать, ' . USER_LOGIN;