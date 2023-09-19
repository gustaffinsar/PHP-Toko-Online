<?php 
    session_start();
    $_SESSION['status_login']=false;
    header("location:home.php");
?>