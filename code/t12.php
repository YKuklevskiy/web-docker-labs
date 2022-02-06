<?php

$arr = [5, 2, 1, 11, 66, 2, 3];

$avg = array_sum($arr) / (float) count($arr);
echo $avg, "\n";

$oneToHundredSum = array_sum(range(1, 100, 1));
echo $oneToHundredSum, "\n";

function var_sqrt(&$a, $key)
{
    $a = sqrt($a);
}

$sqrtArr = $arr; // array of square roots of $arr elements
array_walk($sqrtArr, 'var_sqrt');
//var_dump($sqrtArr);

// key array
$keys = range('a', 'z');
$numbers = range(1, 26);
$keyArray = array_combine($keys, $numbers);
//var_dump($keyArray);

// pair digit sum
$numStr = '1234567890';
$numArr = array_map('intval', str_split($numStr, 2));
$pairSum = array_sum($numArr);
echo $pairSum;