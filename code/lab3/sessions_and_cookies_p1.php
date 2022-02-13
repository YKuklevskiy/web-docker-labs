<?php
header('Content-type: text/html; charset=utf-8');
$text = utf8_decode($_POST['p1']);

$textLength = strlen($text);

$word_rgx = '/[a-z0-9]+/ui'; // words
$match_arr = array();
$wordCount = preg_match_all($word_rgx, $text, $match_arr);

$err = preg_last_error();
if($err == 0) // just in case
    echo "Количество слов: $wordCount<br>Количество символов: $textLength";
else
    echo "Parse error. Error ID: $err";
?>