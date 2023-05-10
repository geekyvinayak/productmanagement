<?php

require 'verify.php';
include '../config.php';

session_start();
// echo $_SESSION["user"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME PAGE</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        img.card-img-top {
            width: 200px;
            height: 200px;
        }

        .card {
            margin: 15px;
            justify-content: center;
            align-items: center;
            padding: 10px;
        }
    </style>
</head>

<body>

    <?php
    session_start();
    $user_id = $_SESSION["user"];
    $result = $product->getuserdata($user_id);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $NAME = "welcome, " . $row['first_name'] . " " . $row['last_name'];
            }
        } else {
            echo "not found";
        }
    }
    ?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Home Page</h2>
                        <?php
                        session_start();
                        if (!$_SESSION["admin"] == 'true') {
                            echo  '<a href="./admin/admin.php" class="btn btn-success pull-right"><i class="fa fa-user-circle-o"></i> ADMIN LOGIN</a>';
                        } else {
                            echo  '<a href="./admin/admin.php" class="btn btn-info pull-right me-2"><i class="fa fa-columns"></i> ADMIN PANEL</a>';
                        }

                        if (!$_SESSION["user"] == 'true') {
                            echo '<a href="./user/login.php" class="btn btn-success pull-right me-2"><i class="fa fa-user"></i> USER LOGIN</a>';
                        } else {
                            echo  '<a href="../user/logout.php" class="btn btn-warning pull-right me-2"><i class="fa fa-sign-out"></i> USER LOGOUT</a>';
                        } ?>
                    </div>
                    <div><?php echo  $NAME ?></div>
                </div>
            </div>
        </div>
    </div>

    <div class='container'>

        <div class='row'>

            <?php
            $result = $product->getcart($_SESSION["user"]);
            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) { ?>
                        <div class='col-md-4'>
                            <div class="card">
                                <img src="../images/<?= $row['image'] ?>" class="card-img-top text-center" alt="./images/<?= $row['image'] ?>">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?= $row['name'] ?>
                                    </h5>
                                    <h5>
                                        <?= $row['price'] ?>
                                    </h5>
                                    <p>
                                    <h5>
                                        Quantity: <?= $row['qty'] ?>
                                    </h5>
                                    </p>
                                    <p class="card-text">
                                        <?= $row['description'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
            <?php }
                }
            } ?>
        </div>
    </div>

</body>

</html>