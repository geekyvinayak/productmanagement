<?php
 require "./verify.php";

 require_once "../config.php";
 $ID = $_GET['id'];
 $result = $product->deleteproduct($ID);

 if ($result > 0) {
    echo "<script>location.href='admin.php';</script>";

    // header("Location: admin.php");
} else {
    echo "<script>location.href='admin.php';</script>";

    // header("Location: admin.php");
}
?>