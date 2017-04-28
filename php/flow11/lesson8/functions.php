<?php
function login($login, $password)
{
    $users = getUsers();
    foreach ($users as $user) {
        if ($user['login'] == $login && $user['password'] == getHashPassword($password)) {
            unset($user['password']);
            $_SESSION['user'] = $user;
            return true;
        }
    }
    return false;
}

function getHashPassword($password)
{
    return md5($password . getSalt());
}

function getLoggedUserData()
{
    if (empty($_SESSION['user'])) {
        return null;
    }
    return $_SESSION['user'];
}

function isAuthorized()
{
    return getLoggedUserData() !== null;
}

function getUsers()
{
    $path = __DIR__ . '/data/users.json';
    $fileData = file_get_contents($path);
    $data = json_decode($fileData, true);
    if (!$data) {
        return [];
    }
    return $data;
}

function isPOST()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function getParam($name)
{
    //!empty($_POST[$name]) ? $_POST[$name] : '';
    return filter_input(INPUT_POST, $name);
}

function location($path)
{
    header("Location: $path.php");
    die;
}

function logout()
{
    session_destroy();
    location('index');
}

function getSalt()
{
    return 'XGDkdf343kdfjskls';
}