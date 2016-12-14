<?php

define('ADMIN_USER', 'admin');
define('ADMIN_PASSWORD', 'pass');

$user = !empty($_SERVER['PHP_AUTH_USER']) ? $_SERVER['PHP_AUTH_USER'] : null;
$password = !empty($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : null;
$isValidUser = $user == ADMIN_USER && $password == ADMIN_PASSWORD;
if (!$user || !$password || !$isValidUser) {
    header('WWW-Authenticate: Basic ream="MyAreaAuth"');
} else {
    echo  'Запретная зона';
}