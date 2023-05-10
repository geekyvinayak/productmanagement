<?php
 $ID = $_GET['id'];
 $NAME = $_POST['name'];
 $IMAGE = $_FILES['image']['name'];


 include "../../config.php";
 
 if($ID == ""){
    $sql = "INSERT INTO brands(brand_name,brand_logo) VALUES ('$NAME','$IMAGE')";
    $result = $product->addbrand($NAME,$IMAGE);
    if($result==1){
echo "<script>location.href='brand.php';</script>";

        // header("Location: brand.php");
    }
    else{
        echo 'Something went wrong';
    }

 }
 else{
    $result = $product->updatebranddata($NAME,$IMAGE,$ID);    
    if($result==1){
echo "<script>location.href='brand.php';</script>";

        // header("Location: brand.php");
    }
    else{
        echo 'Something went wrong';
    }
}

if($IMAGE){
    move_uploaded_file($_FILES['image']['tmp_name'],"../../images/".$IMAGE);

}
