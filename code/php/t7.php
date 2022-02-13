<?php

function printStringReturnNumber(): int
{
    echo "I'm gonna return a value!\n";
    return rand(0, 100);
}

$my_num = printStringReturnNumber();
echo $my_num;