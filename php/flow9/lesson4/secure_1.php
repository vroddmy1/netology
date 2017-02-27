<?php
require_once 'functions.php';

if (!hasRole('manager')) {
    http_response_code(403);
    die('Доступ запрещен');
}
?>
Добро пожаловать, уважаемый Менеджер!