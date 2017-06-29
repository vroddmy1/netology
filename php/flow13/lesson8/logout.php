<?php
require_once 'core/core.php';

if (isAuthorized()) {
    logout();
}
redirect('login');
