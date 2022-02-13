<?php

function sumGreaterThan10(int $a, int $b): bool
{
    return ($a + $b > 10);
}

function equal(int $a, int $b): bool
{
    return ($a == $b);
}

$test = 1;
/*
Перепишите следующий код в сокращенной форме:
<?php
    if ($test == 0) {
        echo 'верно';
    }
?>
*/
if($test == 0) echo "верно\n";

//returns sum of all digits in num
function digitSum(int $num): int 
{
    $sum = 0;
    while($num > 0)
    {
        $sum += $num % 10;
        $num /= 10;
    }
    return $sum;
}

$age = rand(1, 120);
if($age < 10) echo "Возраст меньше 10!\n";
elseif($age > 99) echo "Возраст больше 99!\n";
else {
    $digitSum = digitSum($age);
    if($digitSum <= 9) echo "Сумма цифр возраста однозначна\n";
    else echo "Сумма цифр возраста двузначна\n";
}

// if array has 3 elements echo their sum
$arr = [5,2,66];
if(count($arr) == 3) echo array_sum($arr);