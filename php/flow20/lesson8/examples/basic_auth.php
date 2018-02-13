<?php
define('USER', 'admin');
define('PASS', 'pass');

if (empty($_SERVER['PHP_AUTH_USER']) || empty($_SERVER['PHP_AUTH_PW']) || $_SERVER['PHP_AUTH_USER'] != USER || $_SERVER['PHP_AUTH_PW'] != PASS) {
    header('WWW-Authenticate: Basic realm="MyRealm"');
    die;
}
// ЭТот код выполнится, потому что пользователь ввел корректные реквизиты
echo 'Добро пожаловать, ' . USER;

