<?php
define('ADMIN_USER', 'admin');
define('ADMIN_PASS', 'pass');

$user = !empty($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : null;
$password = !empty($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : null;

if ($user != ADMIN_USER || $password != ADMIN_PASS) {
    header('WWW-Authenticate: Basic realm="myRealm"');
    die;
}
?>

Добро пожаловать, <?= ADMIN_USER ?>