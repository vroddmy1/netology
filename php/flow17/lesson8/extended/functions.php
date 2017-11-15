<?php
session_start();

function login($login, $password)
{
    $user = getUser($login);
    if ($user && $login == $user['login'] && $password == $user['password']) {
        $_SESSION['user'] = $user;
        return true;
    }
    return false;
}

function isAuthorized()
{
    return !empty($_SESSION['user']);
}

function logout()
{
    session_destroy();
}

function isPost() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}


function getPost($name) {
    if (isset($_POST[$name])) {
        return $_POST[$name];
    }
    return null;
    // return isset($_POST[$name]) ? $_POST[$name] : null;
}


function redirect($name) {
    header("Location: $name.php");
    die;
}

function getUsers()
{
    $fileData = file_get_contents(__DIR__ . '/users.json');
    $data = json_decode($fileData, true);
    if (!$data) {
        return [];
    }
    return $data;
}

function getAuthorisedUserData()
{
    return isset($_SESSION['user']) ? $_SESSION['user'] : null;
}

function getUser($login) {
    $users = getUsers();
    foreach ($users as $user) {
        if ($user['login'] == $login) {
            return $user;
        }
    }
    return null;
}