<?php
setcookie('arr[key]', 10);
if (isset($_COOKIE['arr'])) {
    echo '<pre>';
    var_dump($_COOKIE['arr']);
}
