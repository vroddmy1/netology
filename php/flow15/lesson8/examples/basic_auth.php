<?php
define('ADMIN_USER', 'admin');
define('ADMIN_PASSWORD', 'pass');

$login = isset($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : null;
/*if ($_SERVER['PHP_AUTH_USER']) {
    $login = $_SERVER['PHP_AUTH_USER'];
} else {
    $login = null;
}*/
$password = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : null;

if (!$login || !$password || ADMIN_USER != $login || ADMIN_PASSWORD != $password) {
    header('WWW-Authenticate: Basic realm="myRealm"');
    die;
}

echo 'Добро пожаловать, ' . $login;


