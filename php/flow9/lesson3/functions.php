<?php
define('CAPTCHA_FILE', __DIR__ . '/captcha.json');
function saveCaptcha($code)
{
    $ip = getClientIp();
    $data = getCaptchaCodes();
    $data[$ip] = $code;
    file_put_contents(CAPTCHA_FILE, json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
}

function getCaptchaCodes()
{
    if (!file_exists(CAPTCHA_FILE)) {
        return [];
    }
    $data = file_get_contents(CAPTCHA_FILE);
    $data = json_decode($data, true);
    if (!$data) {
        $data = [];
    }
    return $data;
}

/**
 * Проверка кода капчи
 * @param $code
 * @return bool True - если капча введена верно
 */
function checkCaptcha($code) {
    $ip = getClientIp();
    $codes = getCaptchaCodes();
    if(isset($codes[$ip]) && strcmp($codes[$ip], $code) === 0) {
        return true;
    } else {
        return false;
    }
}

function getClientIp()
{
    return $_SERVER['REMOTE_ADDR'];
}

function renderCaptcha($code)
{
    $im = imagecreatetruecolor(300, 300);
    // RGB
    $backColor = imagecolorallocate($im, 255, 224, 221);
    $textColor = imagecolorallocate($im, 129, 15, 90);
    $fontFile = __DIR__ . '/assets/FONT.TTF';
    $imBox = imagecreatefrompng(__DIR__ . '/assets/present.png');
    imagefill($im, 0, 0, $backColor);
    imagecopy($im, $imBox, 10, 10, 0, 0, 256, 256);
    imagettftext($im, 25, 0, 30, 30, $textColor, $fontFile, $code);
    imagepng($im);
    imagedestroy($im);
}

function isPOST()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}
function getParam($name, $defaultValue = null)
{
    return isset($_REQUEST[$name]) ? $_REQUEST[$name] : $defaultValue;
}

function generateCaptchaText($length = 10)
{
    $symbols = '12345678890ASDF';
    $result = [];
    for($i = 0; $i < $length; $i++) {
        $result[$i] = $symbols[mt_rand(0, strlen($symbols) - 1)];
    }
    return implode('', $result);
}