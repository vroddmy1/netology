<?php
session_start();
if (!empty($_SESSION['is_admin'])) {
    echo 'Вы администратор!';
} else {
    echo 'Вы обычный гость!';
}