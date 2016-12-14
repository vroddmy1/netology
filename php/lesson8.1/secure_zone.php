<?php
session_start();
include 'functions/common.php';

if (!isAdmin()) {
    http_response_code(403);
    die('Нет доступа');
}
?>

Это запретная зона, доступная только админ.
