<?php
$uri = $_SERVER['REQUEST_URI'];
if (!file_exists(__DIR__ . $uri)) {
    http_response_code(404);
    echo 'Страница не найдена!';
    die;
}

echo 'Index';