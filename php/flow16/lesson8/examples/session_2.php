<?php
session_start();

if (isset($_SESSION['is_admin'])) {
    print_r($_SESSION['is_admin']);
}
