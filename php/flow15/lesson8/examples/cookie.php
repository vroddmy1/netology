<?php
if (!isset($_COOKIE['name_2'])) {
    setcookie('name_2', 'value_2' /*,time() + 5*/);
    echo 'Куки не было до этого, но мы ее установили. И при следующем запросе мы ее выведем на экран';
} else {
    echo $_COOKIE['name_2'];
}
