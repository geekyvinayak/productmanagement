<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD/Update Brand</title>
    <link rel="stylesheet" href="../login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <style>
        img#img {
            width: 100px;
        }
    </style>
</head>

<body>
    <?php
    
    $ID = $_GET['id'];
    $NAME = '';
    $Price = '';


    include "../../config.php";

    $result = $product->getbranddata($ID);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $ID = $row['brand_id'];
                $NAME = $row['brand_name'];
                $IMAGE = $row['brand_logo'];
            }
        } else {
            echo "not found";
        }
    }
    ?>

    <div id="container">
        <form id="login1-form" method="POST" enctype="multipart/form-data" action="addupdatebrandaction.php?id=<?=$ID?>">
            <h2>
                <?= $ID == "" ? 'add' : 'update'; ?>
            </h2>


            <div class="form-outline mb-2">
                <label class="form-label" for="form2Example1">BRAND NAME</label>
                <input type="text" id="form2Example1" name='name' class="form-control" value="<?= $NAME ?>" />
            </div>

            <div class="form-outline mb-2">
                <label class="form-label" for="form2Example1">IMAGE</label>
                <?php if (isset($IMAGE)) { ?>
                    <img src="../../images/<?= $IMAGE ?>" alt="gr" srcset="" id='img' />
                    <button type="button" class='btn btn-danger' id="cng-btn" onclick="chng()">Change</button>
                    <input type="file" class="form-control d-none" name="image" id='image'>
                <?php } else { ?>
                    <input type="file" class="form-control" name="image">
                <?php }
                ?>
            </div>
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">
                <?= $ID == "" ? 'add' : 'update'; ?>
            </button>
        </form>
        <div>

</body>
<script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"
    integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw=" crossorigin="anonymous"></script>
<script>
    function chng() {
        $('#cng-btn').hide();
        $('#img').hide();
        $('#image').toggleClass('d-none');
        $('#image').attr('required', 'true');
    }
</script>

</html>