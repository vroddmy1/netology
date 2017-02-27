<?php
session_start();

echo $_SESSION['name'];

echo session_save_path();

