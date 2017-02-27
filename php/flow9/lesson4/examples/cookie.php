<?php


if (isset($_COOKIE['data'])) {
    var_dump($_COOKIE['data']);
} else {
    setcookie('data[age]', 12);
    setcookie('data[name]', 'Иван');
}
