<?php
define('USER_DATA_FILE', __DIR__ . '/../data/user.json');
/**
 * Фукнция авторизации пользователя
 * @param $login
 * @param $password
 */
function login($login, $password)
{
    $user = getUser($login);
    if ($user && getPasswordHash($user['id'], $password) == $user['password']) {
        unset($user['password']);
        $_SESSION['user'] = $user;
        return true;
    }
    return false;
}

/**
 * Проверка пользователя, авторизован ли
 * @return bool
 */
function isAuthorized()
{
    return !empty($_SESSION['user']);
}

/**
 * Получение списка пользователей
 * @return array|mixed
 */
function getUsers()
{
    if (!file_exists(USER_DATA_FILE)) {
        return [];
    }
    $data = file_get_contents(USER_DATA_FILE);
    $users = json_decode($data, true);
    if (!$users) {
        return [];
    }
    return $users;
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
        if ($user['login'] == $login) {
            return $user;
        }
    }

    return null;
}

/**
 * Получает данные авторизованного пользователя
 * @return null
 */
function getCurrentUser()
{
    if (empty($_SESSION['user'])) {
        return null;
    }
    return $_SESSION['user'];
}

/**
 * Получает параметр из GET или POST
 * @param $name
 * @return null
 */
function getParam($name)
{
    if (!isset($_REQUEST[$name])) {
        return null;
    }
    return $_REQUEST[$name];
}

/**
 * Проверяет, является ли запрос POST запросом
 * @return bool
 */
function isPost()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

/**
 * Выполняет разлогивание
 * @return bool
 */
function logout()
{
    return session_destroy();
}

/**
 * Выполняет перенаправление на указанную страницу
 * @param $action
 */
function redirect($action)
{
    header("Location: $action.php");
}

function getPasswordHash($id, $password)
{
    return md5($id . $password);
}