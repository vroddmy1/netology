<?php
session_start();

include 'functions/common.php';
logout();
header('Location: session_auth.php');