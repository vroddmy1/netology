<?php
session_start();

function isPost()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

/**
 * Механизм входа в систему
 * @param $login
 * @param $password
 * @return bool Успешность или неуспешность входа
 */
function login($login, $password)
{
    $user = getUser($login);
    if (!$user) {
        return false;
    }
    if ($user['password'] == md5($password)) {
        $_SESSION['user'] = $user;
        return true;
    }

    return false;
}

/**
 * Получение POST параметра
 * @param $name
 * @return null
 */
function getParamPost($name)
{
    return isset($_POST[$name]) ? $_POST[$name] : null;
}

/**
 * Получение всех пользователей из БД
 * @return array|mixed
 */
function getUsers()
{
    $jsonData = file_get_contents(__DIR__ . '/data/users.json');
    $data = json_decode($jsonData, true);
    if (!$data) {
        return [];
    }
    return $data;
}

/**
 * Поиск пользователя по логину
 * @param $login
 * @return mixed|null
 */
function getUser($login)
{
    $users = getUsers();
    foreach ($users as $user) {
        //strcmp() - если бы использовали русские буквы в логине
        if ($user['login'] == $login) {
            return $user;
        }
    }
    return null;
}

function isAuthorized()
{
    return !empty($_SESSION['user']);
}

function redirect($page) {
    header("Location: $page.php");
    die;
}

function logout()
{
    session_destroy();
    redirect('login');
}