<?php
 require "./verify.php";

 require_once "config.php";
 $ID = $_GET['id'];
 $sql = "delete  from products where id=$ID;";

    $result = mysqli_query($link, $sql);

 if ($result > 0) {
    header("Location: admin.php");
} else {
    header("Location: admin.php");
}
?>