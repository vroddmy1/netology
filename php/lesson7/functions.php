<?php
/**
 * Выводит на экран изображение с текстом
 * @param string $text Поздравительный текст
 */
function createImage($text)
{
    header('Content-Type: image/png');
    header('Content-Disposition: attachment; filename="Card_birthday.png"');
    $im = imagecreatetruecolor(800, 600);
    $bc = imagecolorallocate($im, 255, 224, 221);
    $textColor = imagecolorallocate($im, 133, 14, 91);
    $boxPath = realpath(__DIR__ . '/assets/box.png');

    $box = imagecreatefrompng($boxPath);
    $fontPath = realpath(__DIR__ . '/assets/font.ttf');

    imagefill($im, 0, 0, $bc);
    imagettftext($im, 40, 0, 50, 250, $textColor, $fontPath, $text);
    imagecopy($im, $box, 0, 340, 0, 0, 256, 256);

    imagepng($im);
    imagedestroy($im);
    imagedestroy($box);
}

function showJson($array)
{
    //header('Content-Type: text');
    echo json_encode($array);
}

/**
 * Выводит на экран тест
 * @param int $id ID теста
 */
function showTest($id)
{
    if (!is_numeric($id) || $id <= 0) {
        http_response_code(400);
        echo 'Извините но id неверен.';
        die;
    }
    $availableTests = ['1', '2'];
    if (in_array($id, $availableTests)) {
        echo 'Test ' . $id;
    } else {
        http_response_code(404);
        echo 'Извините но запрашиваемая страница не найдена.';
        die;
    }
}










