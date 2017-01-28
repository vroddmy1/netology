<?php
include 'functions/card.php';
header('Content-Type: image/png');
createCard(getQueryParam('name'));
