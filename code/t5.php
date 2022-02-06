<?php

$my_num = 42;
$answer = $my_num;

// quick math magic
$answer += 2;
$answer *= 2;
$answer -= 2;
$answer /= 2;
$answer -= $my_num;

echo $answer; // 1!
