<?php
define('ADMIN_USER', 'admin');
define('ADMIN_PASSWORD', 'pass');

function getQueryParam($name)
{
    return isset($_REQUEST[$name]) ? $_REQUEST[$name] : null;
}

/**
 * Формирует ссылку на основе $_REQUEST параметров,
 * которые указываются в аргументе $params
 * @param $baseUrl
 * @param $params
 * @return string
 */
function getUrlByParams($baseUrl, $params)
{
    if (empty($params)) {
        return $baseUrl;
    }

    $newParams = [];
    foreach ($params as $nameDestination => $paramSource) {
        $newParams[$nameDestination] = getQueryParam($paramSource);
    }

    return $baseUrl . '?' . http_build_query($newParams);
}

function isPOST()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function isGET()
{
    return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function login($login, $password)
{
    if ($login == ADMIN_USER && $password == ADMIN_PASSWORD) {
        $_SESSION['is_admin'] = true;
        $_SESSION['name'] = $login;
        return true;
    }
    return false;
}

function logout()
{
    session_destroy();

}

function isAdmin()
{
    return !empty($_SESSION['is_admin']);
}

function getAdminName()
{
    return !empty($_SESSION['name']) ? $_SESSION['name'] : '';
}