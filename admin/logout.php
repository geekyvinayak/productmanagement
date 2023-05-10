<?php
session_start();

unset($_SESSION["admin"]);
echo "<script>location.href='../index.php';</script>";

// header('location: ../index.php');
?>