<?php

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