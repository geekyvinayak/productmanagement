<?php
session_start();

unset($_SESSION["user"]);

echo "<script>location.href='../index.php';</script>";

// header('location:../index.php');
?>