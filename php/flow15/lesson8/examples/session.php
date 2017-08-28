<?php
session_start();
//ini_set('session.cookie_lifetime', 3600); Установка времени жизни куки сессии
//ini_set('session.gc_maxlifetime', 3600); Установка времени жизни файла сессии на сервере

if (isset($_SESSION['x1'])) {
    //echo $_SESSION['x1'];
} else {
    $_SESSION['x1'] = 1;
}
// Удаляет элемент из сессии
//unset($_SESSION['x1']);

//Удаляет полностью данные сесии
//session_destroy();
echo session_save_path();
