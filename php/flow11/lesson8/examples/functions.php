<?php
define('USER_LOGIN', 'admin');
define('USER_PASSWORD', 'pass');

function basicLogin($login, $password) {
    return $login == USER_LOGIN && $password == USER_PASSWORD;
}