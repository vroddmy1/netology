<?php
session_start();


function auth($login, $password)
{
    $userData = getUser($login);
    $hash = hashPassword($login, $password);
    if (!$userData || $userData['password'] != $hash) {
        return false;
    }
    $_SESSION['user'] = $userData;
    return true;
}

function logout()
{
    session_destroy();
}

function getUserData()
{
    return !empty($_SESSION['user']) ? $_SESSION['user'] : [];
}

function hasRole($role)
{
    if (in_array($role, $_SESSION['user']['roles'])) {
        return true;
    }
    return false;
}

function getUser($login)
{
    $filePath = __DIR__ . '/auth.json';
    if (!$filePath) {
        return false;
    }
    $jsonRaw = file_get_contents($filePath);
    $userDataList = json_decode($jsonRaw, true);
    if (!$userDataList) {
        return false;
    }

    foreach ($userDataList as $user) {
        if ($user['login'] == $login) {
            return $user;
        }
    }
    return false;
}

function hashPassword($login, $password)
{
    return md5($login . ':::' . $password);
}


function isPOST()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function getParam($name, $defaultValue = null)
{
    return isset($_REQUEST[$name]) ? $_REQUEST[$name] : $defaultValue;
}