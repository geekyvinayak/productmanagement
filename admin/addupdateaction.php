<?php
 $ID = $_GET['id'];
 $SKU = $_POST['sku'];
 $NAME = $_POST['name'];
 $Price = $_POST['price'];
 $IMAGE = $_FILES['image']['name'];
 $BRAND = $_POST['brand'];
 $DESC = $_POST['desc'];

//  echo $SKU,$NAME,$Price,$IMAGE,$BRAND,$DESC;

include "../config.php";
 
 if($ID == ""){
    $result = $product->addproduct($SKU,$NAME,$Price,$IMAGE,$BRAND,$DESC);
    if($result==1){
        echo "<script>location.href='admin.php';</script>";
        // header("Location: admin.php");
    }
    else{
        echo 'Something went wrong';
    }
 }
 else{
    $result= $product->updateproductdata($SKU,$NAME,$Price,$IMAGE,$BRAND,$DESC,$ID);
    if($result==1){
        echo "<script>location.href='admin.php';</script>";

        // header("Location: admin.php");
    }
    else{
        echo 'Something went wrong';
    }
}

if($IMAGE){
    move_uploaded_file($_FILES['image']['tmp_name'],"../images/".$IMAGE);

}

 
?>
