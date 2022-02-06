<?php

// function which returns an array where every element is a string of as many "x"'s as it's number
function xArrayFill(int $size): array
{
    $arr = array();
    for ($i=1; $i <= $size; $i++) {
        array_push($arr, str_repeat('x', $i));
    }
    return $arr;
}
$xArr = xArrayFill(5);

// fills an array of size $size with strings $repString
function arrayFill(string $repString, int $size): array
{
    $arr = array();
    for ($i=0; $i < $size; $i++) {
        array_push($arr, $repString);
    }
    return $arr;
}
//var_dump(arrayFill('x', 5));

// returns sum of all elements in the array and in all sub-arrays
// works for two dimensional arrays, and any dimensional arrays of integers really :)
function deepSum(array $arr): int
{
    $sum = 0;
    foreach ($arr as $val) {
        if(is_array($val)) {
            $sum += deepSum($val);
        }
        else {
            $sum += $val;
        }
    }
    return $sum;
}

$twoDimArray = array(
    array(1, 2, 3), 
    array(4, 5), 
    array(6)
);
echo deepSum($twoDimArray), "\n";

// loop-created array
$twoDimArray = array();
for ($i=0; $i < 3; $i++) {
    $tempArray = array();
    for ($j=0; $j < 3; $j++) { 
        array_push($tempArray, $i*3+$j+1);
    }
    array_push($twoDimArray, $tempArray);
}
//var_dump($twoDimArray);

$fourElementArray = array(2, 5, 3, 9);
$prod1 = $fourElementArray[0]*$fourElementArray[1];
$prod2 = $fourElementArray[2]*$fourElementArray[3];
$result = $prod1 + $prod2;
echo $result, "\n";

// "user info"
$user = array(
    'name' => 'Yaroslav', 
    'surname' => 'Kuklevskiy', 
    'patronymic' => 'Olegovich'
);
echo "{$user['surname']} {$user['name']} {$user['patronymic']}\n";

// today's date
$date = array(
    'year' => 2022, 
    'month' => 'Feb',
    'day' => 6
);
echo "{$date['year']}-{$date['month']}-{$date['day']}\n";

// elem count
$arr = ['a', 'b', 'c', 'd', 'e'];
echo count($arr), "\n";

// last and penultimate elem
end($arr); // set pointer to last elem
echo current($arr), "\n"; // last elem
echo prev($arr), "\n"; // penultimate elem