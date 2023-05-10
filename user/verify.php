<?php
session_start();
if(!isset($_SESSION["user"])){
echo "<script>location.href='/mobileshop/user/login.php';</script>";

    header("Location:/mobileshop/user/login.php");
}
?>