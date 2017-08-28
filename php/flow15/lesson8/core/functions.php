<?php
define('USERS_FILE', __DIR__ . '/../data/users.json');

/**
 * Выполняет механизм Login
 * @param $login
 * @param $password
 * @return bool
 */
function login($login, $password)
{
    $user = getUser($login);
    if (!$user || $user['password'] != getHash($password)) {
        return false;
    } else {
        unset($user['password']);
        // Устанавливаем данные пользователя в сесиии
        // По этим данным мы будем определять что пользователь авторизован
        $_SESSION['user'] = $user;
        return true;
    }
}

/**
 * Проверяет, авторизован ли пользователь
 * @return bool
 */
function isAuthorized()
{
    return !empty($_SESSION['user']);
}

function isPost()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function getParam($name)
{
    return isset($_REQUEST[$name]) ? $_REQUEST[$name] : null;
}

/**
 * Получает список пользователей
 * @return array|mixed
 */
function getUsers()
{
    if (!file_exists(USERS_FILE)) {
        return [];
    }
    $fileData = file_get_contents(USERS_FILE);
    $users = json_decode($fileData, true);
    if (!$users) {
        return [];
    }
    return $users;
}

/**
 * Получает данные пользователя по логину
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

function addUser($login, $password, $username)
{
    $users = getUsers();
    $users[] = [
        'id' => getMaxUserId() + 1,
        'login' => $login,
        'password' => getHash($password),
        'username' => $username,
    ];

    $json = json_encode($users, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    return file_put_contents(USERS_FILE, $json);
}

function getMaxUserId()
{
    $users = getUsers();
    $ids = array_column($users, 'id');
    return max($ids);
}

/**
 * Получает данные авторизованного пользователя
 * @return null
 */
function getAuthorizedUser() {
    return isset($_SESSION['user']) ? $_SESSION['user'] : null;
}

/**
 * Производит редирект на нужную страницу
 * @param $page
 */
function redirect($page) {
    header("Location: $page.php");
    die;
}

function logout() {
    if (isAuthorized()) {
        session_destroy();
    }
    redirect('login');
}

function getHash($password)
{
    return md5($password);
}