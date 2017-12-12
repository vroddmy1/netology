<?php
if (!empty($_COOKIE['my_cookies'])) {
    echo $_COOKIE['my_cookies'];
} else {
    setcookie('my_cookies', 'my_value', time() + 5);
}
echo '<br/>';
echo date('Y-m-d H:i:s');
