<?php
session_start();
//echo session_save_path();
if (!empty($_GET['color'])) {
    if (in_array($_GET['color'], ['red', 'blue', 'black'])) {
        $_SESSION['color'] = $_GET['color'];
    }
}

if (!empty($_SESSION['color'])) {
    echo $_SESSION['color'];
}





