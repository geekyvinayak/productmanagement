<?php
session_start();
$id = $_POST['id'];

$user_id = $_SESSION['user'];
// echo $id;
include '../config.php';
$res = $product->setcart($user_id,$id);
// print_r($res);
echo 1;
?>