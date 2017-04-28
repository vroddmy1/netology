<?php
require_once 'core.php';
if (!isAuthorized()) {
    location('login');
}
?>
Защищенная зона.
