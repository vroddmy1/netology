<?php

$a = 10;

function example1()
{
    $a = 11;
    return $a;
}

$a = example1();
echo $a;