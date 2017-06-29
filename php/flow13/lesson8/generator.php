<?php
require_once 'core/core.php';

if (!isAuthorized()) {
    redirect('login');
}
$userId = filter_input(INPUT_GET, 'user_id');
$userPassword = filter_input(INPUT_GET, 'user_password');
if (empty($userId) || empty($userPassword)) {
    echo 'Введите в GET параметры user_id и user_password';
    die;
}
echo getPasswordHash($userId, $userPassword);
