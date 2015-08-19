<?php
session_start();
$_SESSION=array();
session_destroy();
if(!isset($_SESSION['name']))
{
header("location: ../index.php");
}
else
{
echo "<h1>Could not log you out, Sorry!</h1>";
    exit();
}
?>