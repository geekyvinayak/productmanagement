<?php
 $ID = $_GET['id'];
 $SKU = $_POST['sku'];
 $NAME = $_POST['name'];
 $Price = $_POST['price'];
 $IMAGE = $_FILES['image']['name'];
 $BRAND = $_POST['brand'];
 $DESC = $_POST['desc'];

//  echo $SKU,$NAME,$Price,$IMAGE,$BRAND,$DESC;

 require_once "config.php";
 
 if($ID == ""){
    $sql = "INSERT INTO products(sku,name,price,image,brand_id,description) 
    VALUES ('$SKU','$NAME',$Price,'$IMAGE',$BRAND,'$DESC')";
    $result = mysqli_query($link, $sql);
    if($result==1){
        header("Location: admin.php");
    }
    else{
        echo 'Something went wrong';
    }

 }
 else{
    if($IMAGE){
        $sql = "UPDATE products SET sku='$SKU',name='$NAME',price=$Price,image='$IMAGE',brand_id=$BRAND,description='$DESC' 
        WHERE id=$ID";
    }
    else{
        $sql = "UPDATE products SET sku='$SKU',name='$NAME',price=$Price,brand_id=$BRAND,description='$DESC' 
        WHERE id=$ID";
    }
    $result = mysqli_query($link, $sql);
    if($result==1){
        header("Location: admin.php");
    }
    else{
        echo 'Something went wrong';
    }
}
if($IMAGE){
    move_uploaded_file($_FILES['image']['tmp_name'],"images/".$IMAGE);

}

 
?>
