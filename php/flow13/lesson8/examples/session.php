<?php
session_start();

echo session_save_path();

/*if (!empty($_GET['name'])) {
    $_SESSION['name'] = $_GET['name'];
}
var_dump($_SESSION); die;*/
