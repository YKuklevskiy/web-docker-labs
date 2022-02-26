<?php 
session_start(); 

require_once("userdata.php");

if($_POST["name"] != "" && $_POST["age"] != "" && $_POST["salary"] != "")
{
    if(!isset($_SESSION["userdata"]))
        $_SESSION["userdata"] = array();

    $user = new UserData(
        utf8_decode($_POST["name"]), 
        utf8_decode($_POST["age"]), 
        utf8_decode($_POST["salary"]),
        utf8_decode($_POST["something"])
    );

    $user_serialized = serialize($user);

    if(!in_array($user_serialized, $_SESSION["userdata"], true)) // if new data, add to session
    {
        array_push($_SESSION["userdata"], $user_serialized);
    }
}

header('Location: userdata_task3.php');
?>