<?php
session_start();
echo session_save_path();

if (empty($_SESSION['is_admin'])) {
    echo 'Вы не админ!';
    die;
}

echo 'Здравствуйте, админ!';
