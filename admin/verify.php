<?php
session_start();
if(!$_SESSION["admin"]=='true'){
echo "<script>location.href='login.php';</script>";
    
    // header("Location: login.php");
}
?>