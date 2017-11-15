<?php
if (empty($_COOKIE['my_cookie'])) {
    setcookie('auth', 'cookie value', time() + 10, '/');
} else {
    echo $_COOKIE['my_cookie'];
}