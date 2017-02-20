<?php

$_GET = 10;

function example1()
{
    $_GET = 11;
}

example1();
echo $_GET;