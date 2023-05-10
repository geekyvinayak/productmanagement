<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
        <script>
            function myFunction() {
                if (confirm('Are you sure you want to delete') === true) {
      return true;
    } else {
      return false;
    }
}
        </script>
</head>

<body>
    <?php include('verify.php') ?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Product Management</h2>
                        <a href="logout.php" class="btn btn-danger pull-right"><i class="fa fa-sign-out"></i> Logout</a>
                        <a href="./brandmanagement/brand.php" class="btn btn-info pull-right me-2"><i class="fa fa-pencil"></i>Manage Brands</a>
                        <a href="addupdate.php" class="btn btn-success pull-right me-2"><i class="fa fa-plus"></i> Add New
                            Product</a>
                        <a href="../index.php" class="btn btn-success pull-right me-2"><i class="fa fa-home"></i> Home</a>
                    </div>
                    <?php
                    // Include config file
                    include "../config.php";

                    // Attempt select query execution
                    $result = $product->adminpaneldata();
                    if ($result) {
                        if (mysqli_num_rows($result) > 0) { ?>
                             <table class="table table-bordered table-striped">
                             <thead>
                             <tr>
                             <th>ID</th>
                             <th>SKU</th>
                             <th>NAME</th>
                             <th>Price</th>
                             <th>IMAGE</th>
                             <th>BRAND NAME</th>
                             <th>DESC</th>
                             <th>OPERATIONS</th>
                             </tr>
                             </thead>
                             <tbody>
                           <?php while ($row = mysqli_fetch_array($result)) { ?>
                                <tr>
                                <td><?=$row['id']?></td>
                                <td><?=$row['sku']?></td>
                                <td><?=$row['name']?></td>
                                <td><?=$row['price']?> </td>
                                <td style="width:150px"><img src="../images/<?=$row['image']?>" class="img-thumbnail w-100"/></td>
                                <td><?=$row['brand_name']?></td>
                                <td><?=$row['description']?> </td>
                                <td>
                                <a href="addupdate.php?id=<?=$row['id']?>" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>
                                <a href="delete.php?id=<?=$row['id']?>" title="Delete Record" data-toggle="tooltip"><span onclick="return myFunction()" class="fa fa-trash"></span></a>
                                </td>
                                </tr>
                            <?php } ?> 
                            </tbody>
                            </table>
                            <?php 
                            // Free result set
                            mysqli_free_result($result);
                        } else {
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>