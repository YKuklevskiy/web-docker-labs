<?php

$num_languages = 4; // Ruby, Python, JavaScript, C++
$months = 11; // months spent
$days = $months * 16; // quality-days

$days_per_language = $days / $num_languages;
echo "В среднем у Мэг на изучение языка ушло {$days_per_language} дня.";
