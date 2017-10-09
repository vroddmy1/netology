<?php

if (isset($_COOKIE['font-size'])) {
    setcookie('font-size', '16', time() - 1);
    $fontSize = (int)$_COOKIE['font-size'];
    echo '<span style="font-size: ' . $fontSize . 'px;">' . $_COOKIE['font-size'] . '</span>';
} else {
    //setcookie('font-size', '16', time() + 3600 * 24 * 365);
    echo 'Установили куку';
}


