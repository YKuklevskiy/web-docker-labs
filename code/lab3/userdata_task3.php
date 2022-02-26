<?php 
session_start(); 
header('Content-type: text/html; charset=utf-8');

require_once("userdata.php");

if(count($_SESSION["userdata"]) == 0)
{
    echo "<h2>User data is empty.</h2>";
    return;
}
?>

<h2>List of users:</h2>
<ul>
    <?php 
    //here we loop through users
    foreach ($_SESSION["userdata"] as $user) {
        $userdata = unserialize($user)->getUserInfo(); // array with info

        echo "<ul>";
        //here we loop through userdata
        foreach ($userdata as $key => $value) {
            if(trim($value) != "")
            {
                $uppercase_key = ucfirst($key);
                echo "<li>", "$uppercase_key: $value", "</li>";
            }
        }
        echo "</ul>"; 
        echo "<br>";
    }
    ?>
</ul>