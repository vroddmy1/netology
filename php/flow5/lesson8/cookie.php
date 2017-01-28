<?php
$name = isset($_GET['name']) ? $_GET['name'] : null;
if ($name) {
    // Отрпавка на клиент через заголовки
    setcookie('name', $name, time() + 3600, '/');
} elseif (!empty($_COOKIE['name'])) {
    echo 'Привет, ' .  $_COOKIE['name'] . '!';
} else {
    echo 'Представьтесь!';
}

