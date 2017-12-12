<?php
define('ADMIN_USER', 'admin');
define('ADMIN_PASS', 'pass');

if (empty($_SERVER['PHP_AUTH_USER']) && empty($_SERVER['PHP_AUTH_PW']) || $_SERVER['PHP_AUTH_USER'] != ADMIN_USER || $_SERVER['PHP_AUTH_PW'] != ADMIN_PASS) {
    header('WWW-Authenticate: Basic realm="X"');
    die;
}

// setcookie('is_admin', 1) <-- Так делать нельзя, в куках не храним секьюрные данные.

echo 'Добро пожаловать, ' . ADMIN_USER;