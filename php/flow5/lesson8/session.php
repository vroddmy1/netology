<?php
session_start();
include 'functions.php';
setError('Test message');
echo session_save_path();
