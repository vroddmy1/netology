<?php

function example()
{
    echo 'Example buffer';
}

function getParam($paramName, $default = null) {
    /*if (isset($_REQUEST[$paramName])) {
        return $_REQUEST[$paramName];
    }
    return null;*/
    return !empty($_REQUEST[$paramName]) ? $_REQUEST[$paramName] : $default;
}

function renderCard($text)
{
    $im = imagecreatetruecolor(800, 600);
    $backColor = imagecolorallocate($im, 255, 224, 221);
    $textColor = imagecolorallocate($im, 129, 15, 90);

    $boxIm = imagecreatefrompng(__DIR__ . '/assets/box.png');
    $fontPath = __DIR__ . '/assets/font.ttf';

    imagefill($im, 0, 0, $backColor);
    imagecopy($im, $boxIm, 0, 330, 0, 0, 256, 256);
    imagettftext($im, 36, 0, 50, 260, $textColor, $fontPath, $text);

    imagepng($im);
    imagedestroy($im);
    imagedestroy($boxIm);
}


function checkAvailable()
{
    return false;
}







