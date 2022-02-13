<?php

/*
Напишите регулярку, которая найдет строки 'abba', 'adca',
'abea' по шаблону: буква 'a', два любых символа, буква 'b'.
Пример строки: $str = 'ahb acb aeb aeeb adcb axeb';
*/

$regex = '/a..b/';
$sampleStr = 'ahb acb aeb aeeb adcb axeb';
$resultArr = array();

preg_match_all($regex, $sampleStr, $resultArr);

print_r($resultArr);
echo "<br>";

/*
Дана строка с целыми числами 'a1b2c3'. С помощью
регулярки преобразуйте строку так, чтобы вместо этих
чисел стояли их кубы.
*/

$regex = '/[0-9]{1,}/'; // finds all numbers in the string
$sampleStr = 'a1b2c3';
$resultArr = array();

// preg_match_all($regex, $sampleStr, $resultArr);

function cube($matches)
{
	return pow($matches[0], 3);
}

$result = preg_replace_callback($regex, 'cube', $sampleStr);

echo "$result<br>";