<?php
session_start();
define('DATA_FILE', __DIR__ . '/../data/user.json');

function isPost()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function login($login, $password)
{
    $user = getUser($login);
    $passwordHash = getPasswordHash($password);
    if ($user === null || $user['password'] !== $passwordHash) {
        return false;
    }
    unset($user['password']);
    $_SESSION['user'] = $user;
    return true;
}

function getParam($name)
{
    return isset($_REQUEST[$name]) ? $_REQUEST[$name] : null;
}

function getUsers()
{
    if (!file_exists(DATA_FILE)) {
        // Здесь бы еще логирование (запись ошибки в файл лога) ошибки.
        return [];
    }
    $data = json_decode(file_get_contents(DATA_FILE), true);
    if (empty($data)) {
        // Здесь бы еще логирование (запись ошибки в файл лога) ошибки.
        return [];
    }
    return $data;
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

function getAuthorizedUser()
{
    return !empty($_SESSION['user']) ? $_SESSION['user'] : null;
}

function isAuthorized()
{
    return !empty($_SESSION['user']);
}

function logout()
{
    session_destroy();
}

function getPasswordHash($password) {
    // Соль для пароля, которую никто не знает
    // Она нужна длябольшей надежности сгенерированного хэша
    // Как правило здесь можно хранить ID записи в базе
    $salt = 'XXXXYYYY...';
    return md5($password . $salt);
}

function redirect($page)
{
    header('Location: /admin/' . $page . '.php');
    die;
}