<?php  
session_start();
if (isset($_SESSION["activeUser"]) && isset($_SESSION["id"]))
{
 
}
else
{
    header("location:../auth");
}
?>