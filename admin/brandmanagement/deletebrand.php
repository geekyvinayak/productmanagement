<?php
 require "../verify.php";

include "../../config.php";
 $ID = $_GET['id'];

 $result = $product->deletebrand($ID);

 if ($result > 0) {
echo "<script>location.href='brand.php';</script>";

    // header("Location: brand.php");
} else { 
echo "<script>location.href='brand.php';</script>";

    // header("Location: brand.php");
}
?>