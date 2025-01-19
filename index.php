<?php 
session_start();
if(isset($_SESSION['activeUser'])){
    header("Location:admin");
}
else{
    header("Location:auth");
}

?>