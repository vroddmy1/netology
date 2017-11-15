<?php
session_start();

define('ADMIN_LOGIN', 'admin');
define('ADMIN_PASSWORD', 'pass');

function login($login, $password)
{
    if ($login == ADMIN_LOGIN && $password == ADMIN_PASSWORD) {
        $_SESSION['is_authorized'] = 1;
        return true;
    }
    return false;
}

function isAuthorized()
{
    return !empty($_SESSION['is_authorized']);
}

function logout()
{
    session_destroy();
}

function isPost() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}
