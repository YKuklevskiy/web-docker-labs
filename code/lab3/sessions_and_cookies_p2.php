<?php 
session_start(); 

if($_POST["rewrite"] == true && ($_POST["name"] != "" && $_POST["surname"] != "" && $_POST["age"] != ""))
{
    $_SESSION["name"] = utf8_decode($_POST['name']);
    $_SESSION["surname"] = utf8_decode($_POST['surname']);
    $_SESSION["age"] = utf8_decode($_POST['age']);
}

header('Location: userdata_task2.php');
?>