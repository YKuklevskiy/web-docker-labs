<?php 
session_start(); 
header('Content-type: text/html; charset=utf-8');

echo "<h2>";
if($_SESSION["name"] == "" || $_SESSION["surname"] == "" || $_SESSION["age"] == "")
{
    echo "User data is empty.";
    return;
}

echo "User: {$_SESSION["surname"]} {$_SESSION["name"]}<br>Age: {$_SESSION["age"]}";

echo "</h2>";
?>