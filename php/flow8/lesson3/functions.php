<?php


function renderCaptcha($text)
{
    $im = imagecreatetruecolor(300, 300);
    // RGB
    $backColor = imagecolorallocate($im, 255, 224, 221);
    $textColor = imagecolorallocate($im, 129, 15, 90);
    $fontFile = __DIR__ . '/assets/font.ttf';

    $imBox = imagecreatefrompng(__DIR__ . '/assets/box.png');

    imagefill($im, 0, 0, $backColor);
    imagecopy($im, $imBox, 10, 10, 0, 0, 256, 256);
    imagettftext($im, 14, 0, 10, 20, $textColor, $fontFile, $text);
    imagepng($im);
    imagedestroy($im);
}

function generateCaptchaText($length = 10)
{
    $symbols = '12345678890ASDF';
    $result = [];
    for($i = 0; $i < $length; $i++) {
        $result[$i] = $symbols[mt_rand(0, $length - 1)];
    }
    return implode('', $result);
}

/**
 * Функция, сохраняющая ip и сгенерированный код капчи в файл
 * @param string $code Код капчи
 */
function saveCaptcha($code)
{
    $ip = $_SERVER['REMOTE_ADDR'];
    $data = getCaptchaData();
    $data[$ip] = $code;
    setCaptchaData($data);
}

function getCaptchaData()
{
    $fileName = __DIR__ . '/data.json';
    $jsonData = file_get_contents($fileName);
    return (array)json_decode($jsonData, true);
}

function setCaptchaData($data)
{
    $fileName = __DIR__ . '/data.json';
    file_put_contents($fileName, json_encode($data));
}

function checkCaptcha($text)
{
    $ip = $_SERVER['REMOTE_ADDR'];
    $realData = getCaptchaData();
    if (!empty($realData[$ip]) && $realData[$ip] == $text) {
        return true;
    }

    return false;
}

function cleanCaptcha()
{
    $ip = $_SERVER['REMOTE_ADDR'];
    $realData = getCaptchaData();
    $realData[$ip] = null;
    setCaptchaData($realData);
    return false;
}

function isPost()
{
    return !empty($_POST);
}

function getParamGet($name, $defaultValue = null)
{
    return !empty($_GET[$name]) ? $_GET[$name] : $defaultValue;
}

function getParamPost($name, $defaultValue = null)
{
    return !empty($_POST[$name]) ? $_POST[$name] : $defaultValue;
}