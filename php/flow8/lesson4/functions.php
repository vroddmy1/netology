<?php
define('USER_LOGIN', 'admin');
define('USER_PASS', 'pass');

function basicAuth()
{
    if (isset($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW'])) {
        $isValidUser = $_SERVER['PHP_AUTH_USER'] == USER_LOGIN;
        $isValidUser = $isValidUser && $_SERVER['PHP_AUTH_PW'] == USER_PASS;
    }

    if (!isset($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) || empty($isValidUser)) {
        // Если запрос без логина и пароля (первичный).
        header('WWW-Authenticate: Basic realm="myRealm"');
        return false;
    }
    return true;
}

function login($login, $password)
{
    // ТАК ДЕЛАТЬ НЕЛЬЗЯ!!!
    /*if ($login == USER_LOGIN && $password == USER_PASS) {
        setcookie('is_admin', 1);
        return true;
    }
    return false;*/
}

function isAdmin()
{
    // ТАК ДЕЛАТЬ НЕЛЬЗЯ!!!
    //return !empty($_COOKIE['is_admin']);
}


function isPost()
{
    return !empty($_POST);
}

function getParamGet($name, $defaultValue = null)
{
    return !empty($_GET[$name]) ? $_GET[$name] : $defaultValue;
}

function getParamPost($name, $defaultValue = null)
{
    return !empty($_POST[$name]) ? $_POST[$name] : $defaultValue;
}