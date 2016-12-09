<?php
include_once 'common.php';
/**
 * Формирует открытку и выводит содержимое на экран
 * @param $name
 */
function createCard($name)
{
    $canvas = imagecreatetruecolor(800, 600);
    $bc = imagecolorallocate($canvas, 255, 224, 221);
    $tc = imagecolorallocate($canvas, 133, 14, 91);
    $font = __DIR__ . '/../assets/font.ttf';
    $box  = imagecreatefrompng(__DIR__ . '/../assets/box.png');
    imagefill($canvas, 0, 0, $bc);
    imagecopy($canvas, $box, 0, 340, 0, 0, 256, 256);
    imagettftext($canvas, 40, 0, 50, 250, $tc, $font, $name);
    imagepng($canvas);
    imagedestroy($canvas);
}

/**
 * Сохраняет изображение в виде файла
 * @param $fileName
 * @param $name
 */
function saveCard($fileName, $name) {
    header('Content-Disposition: attachment; filename="' . $fileName . '"');
    createCard($name);
}