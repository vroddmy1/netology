<?php

if (!empty($_GET['user_name'])) {
    setcookie('user_name', $_GET['user_name'], time() - 10);
}

if (!empty($_COOKIE['user_name'])) {
    echo 'Добро пожаловать, ' .  $_COOKIE['user_name'];
}