<?php

// mod operator
$a = 10;
$b = 3;
$modResult = $a % $b;
echo $modResult, "\n"; // should be 1

// mod & if-else
$a = 42;
$b = 21;
$result;
if ($a % $b === 0) {
    $temp = $a / $b;
    $result = "Делится: {$temp}.";
}
else {
    $temp = $a % $b;
    $result = "Делится с остатком: {$temp}.";
}
echo $result, "\n";

// sqrt, pow
$st = pow(2, 10);
echo "2^10 = {$st}\n";

$sq = sqrt(245);
echo "245^0.5 = {$sq}\n";

// arrays
$array = array(4, 2, 5, 19, 13, 0, 10);
$arraySum = 0;
foreach ($array as &$val) {
    $arraySum += $val**2; // sum of squares
}
$dist = sqrt($arraySum); // square root of sum

echo $dist, "\n";

// rounding
echo "Корень 379:\n";

$sq = round(sqrt(379));
echo "С точностью до целых: {$sq}\n";
$sq = round(sqrt(379), 1); // 1-digit precision
echo "С точностью до десятых: {$sq}\n";
$sq = round(sqrt(379), 2); // 2-digit precision
echo "С точностью до сотых: {$sq}\n";

$sq = sqrt(587);
$roundArray = array("floor" => floor($sq), "ceil" => ceil($sq));
echo "{$roundArray["floor"]}, {$roundArray["ceil"]}\n"; // echo results

// min, max
$minmaxArray = array(4, -2, 5, 19, -130, 0, 10);
$minVal = min($minmaxArray);
$maxVal = max($minmaxArray);
echo "Min: {$minVal}\nMax: {$maxVal}\n";

// random
$randomValue = rand(1, 100); //inclusive
echo $randomValue, "\n";

$randomArray = array();
for ($i=0; $i < 10; $i++) { 
    $randomArray[$i] = rand();
    echo "{$randomArray[$i]} "; // echo elements of array
}
echo "\n";

// abs
$a = 9;
$b = -4;
$diff = abs($a-$b);
echo $diff, "\n";

$initialArray = array(1, 2, -1, -2, 3, -3);
$resultArray = $initialArray;
foreach ($resultArray as &$value) {
    $value = abs($value);
    echo "{$value} "; // echo elements of array
}
echo "\n";

// summary

// divisors
$num = rand(1, 255);
$numDivisors = array();
for ($i=1; $i <= $num; $i++) { 
    if ($num % $i == 0) {
        array_push($numDivisors, $i);
        echo "$i ";
    }
}
echo "\n";

//"sum overflow"
$initialArray = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
$numSum = 0;
for ($i=0; $i < count($initialArray); $i++) { 
    $numSum += $initialArray[$i];
    if ($numSum > 10) {
        $result = $i+1;
        break;
    }
}
echo $result;