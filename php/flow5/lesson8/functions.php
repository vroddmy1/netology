<?php
define('USER', 'admin');
define('PASSWORD', 'admin');

function logout()
{
    session_destroy();
    header('Location: ' . getLoginPath());
}

function login($login, $password)
{
    if ($login == USER && $password == PASSWORD) {
        $_SESSION['login'] = $login;
        return true;
    } else {
        setError('Некорректный пароль');
    }
    return false;
}

function setError($msg)
{
    $_SESSION['error'] = $msg;
}

function getError()
{
    return isset($_SESSION['error']) ? $_SESSION['error'] : '';
}

function clearError()
{
    unset($_SESSION['error']);
}


function isLogged()
{
    return !empty($_SESSION['login']);
}

function getLoginPath()
{
    return '/lesson8/form.php';
}