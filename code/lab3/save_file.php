<?php 
require_once("ad_data.php");

if($_POST["email"] != "" && $_POST["category"] != "" && $_POST["header"] != "" && $_POST["ad"] != "")
{
    $email = $_POST["email"];
    $category = $_POST["category"];
    $header = $_POST["header"];
    $text = $_POST["ad"];
    
    $adFile = fopen('adCategories/' . $category . '/' . $header . '.txt', 'w');

    $data = new AdData($email, $header, $text);
    fwrite($adFile, serialize($data));
    fclose($adFile);
}

header('Location: ../index.php');
?>