<?php

// adds exclamation mark at the end
function increaseEnthusiasm(string $input): string
{
    return $input . '!';
}

echo increaseEnthusiasm('Pumped up'), "\n";

function repeatThreeTimes(string $input): string
{
    return $input . $input . $input;
}

echo repeatThreeTimes('?'), "\n";
echo increaseEnthusiasm(repeatThreeTimes('Yes')), "\n";

// returns the input string cut to {$len} symbols
function cut(string $input, int $len = 10): string
{
    return substr($input, 0, $len);
}

// recursively prints all values in the array
function recursiveArrayPrint(array &$arr, bool $walking = false)
{
    if(!$walking) reset($arr);
    
    $elem = current($arr);
    if($elem === false){
        echo "\n";
        return;
    }
    echo "$elem ";
    next($arr);
    recursiveArrayPrint($arr, true);
}
// $exampleArray = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
// echo recursiveArrayPrint($exampleArray);

function recursiveDigitSum(int $value): int
{
    $value = abs($value);
    $sum = 0;
    while($value > 0)
    {
        $sum += $value % 10;
        $value /= 10;
    }
    if($sum > 9) return recursiveDigitSum($sum);
    return $sum;
}
//echo recursiveDigitSum(-1762515161124421);