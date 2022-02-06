<?php

function pyramid(int $height)
{
    for ($i=1; $i <= $height; $i++) { 
        echo str_repeat('x', $i), "\n";
    }
}

pyramid(20); // no html - no pyramid...