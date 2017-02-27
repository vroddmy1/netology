<?php
require_once 'functions.php';

if (!hasRole('admin')) {
    http_response_code(403);
    die('Доступ запрещен');
}
echo hashPassword($_GET['login'],$_GET['password']);