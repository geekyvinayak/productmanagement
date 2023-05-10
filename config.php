<?php

class config
{

    private $server = '127.0.0.1';
    private $user = 'root';
    private $password = 'root';
    private $dbname = 'mobileshop';
    public function connect()
    {
        $conn = mysqli_connect($this->server, $this->user, $this->password, $this->dbname);

        return $conn;
    }

    public function getdata()
    {
        $sql = "select id,name,price,image,description,brands.brand_name from products, brands where brands.brand_id=products.brand_id ORDER by products.id;";
        $result = $this->connect()->query($sql);
        return $result;
    }

    public function getuserdata($id)
    {
        $sql = "select first_name,last_name from user where id=$id";
        $result = $this->connect()->query($sql);
        return $result;
    }
    public function getadmindata($email)
    {
        $sql = "SELECT * FROM admin where email='$email'";
        $result = $this->connect()->query($sql);
        return $result;
    }

    public function adminpaneldata()
    {
        $sql = "select id,sku,name,price,image,description,brands.brand_name from products, brands where brands.brand_id=products.brand_id ORDER by products.id;";
        $result = $this->connect()->query($sql);
        return $result;
    }

    public function getbranddata($id)
    {
        $sql = "SELECT * from brands where brand_id=$id;";
        $result = $this->connect()->query($sql);
        return $result;
    }

    public function addbrand($NAME, $IMAGE)
    {
        $sql = "INSERT INTO brands(brand_name,brand_logo) VALUES ('$NAME','$IMAGE')";
        $result = $this->connect()->query($sql);
        return $result;
    }


    public function updatebranddata($NAME, $IMAGE,$ID)
    {
        if($IMAGE){
            $sql = "UPDATE brands SET brand_name='$NAME',brand_logo='$IMAGE' WHERE brand_id=$ID";
        }
        else{
            $sql = "UPDATE brands SET brand_name='$NAME' WHERE brand_id=$ID";
        }
        $result = $this->connect()->query($sql);
        return $result;
    }

    public function getallbranddata()
    {
        $sql = "select * from brands";
        $result = $this->connect()->query($sql);
        return $result;
    }
    
    public function deletebrand($ID)
    {
        $sql = "delete from brands where brand_id=$ID;";
        $result = $this->connect()->query($sql);
        return $result;
    }

    public function getproductdata($ID)
    {
        $sql = "SELECT * , brands.brand_name from products, brands where brands.brand_id=products.brand_id and products.id=$ID;";
        $result = $this->connect()->query($sql);
        return $result;
    }

    public function updateproductdata($SKU,$NAME,$Price,$IMAGE,$BRAND,$DESC,$ID)
    {
        if($IMAGE){

            $sql = "UPDATE products SET sku='$SKU',name='$NAME',price=$Price,image='$IMAGE',brand_id=$BRAND,description='$DESC' 
            WHERE id=$ID";
        }
        else{
            $sql = "UPDATE products SET sku='$SKU',name='$NAME',price=$Price,brand_id=$BRAND,description='$DESC' 
            WHERE id=$ID";
        }
        $result = $this->connect()->query($sql);
        return $result;
    }

    public function addproduct($SKU,$NAME,$Price,$IMAGE,$BRAND,$DESC)
    {
        $sql = "INSERT INTO products(sku,name,price,image,brand_id,description) VALUES ('$SKU','$NAME',$Price,'$IMAGE',$BRAND,'$DESC')";
        $result = $this->connect()->query($sql);
        return $result;
    }

    public function deleteproduct($ID)
    {
        $sql = "delete  from products where id=$ID;";
        $result = $this->connect()->query($sql);
        return $result;
    }

    public function userlogin($email)
    {
        $sql = "SELECT * FROM user where email='$email'";
        $result = $this->connect()->query($sql);
        return $result;
    }

    public function getcart($user_id)
    {
        $sql = "select products.*,brands.brand_name ,qty from products,brands,cart where products.brand_id=brands.brand_id and products.id=cart.productid and cart.userid=$user_id; ";
        $result = $this->connect()->query($sql);
        return $result;
    }

    public function setcart($user_id,$product_id)
    {
        $sql = "select products.*,brands.brand_name ,qty from products,brands,cart where products.brand_id=brands.brand_id and cart.productid=$product_id and cart.userid=$user_id; ";
        $result = $this->connect()->query($sql);
        if($result->num_rows>0){
            $sql = "update cart set qty=qty+1 where userid=$user_id and productid=$product_id";
            $result = $this->connect()->query($sql);
        }
        else{
            $sql = "insert into cart set qty=1 ,productid=$product_id ,userid=$user_id" ;
            $result = $this->connect()->query($sql);
        }
        return $result;
    }

}
$product = new config();
