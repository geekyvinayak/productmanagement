<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD/Update</title>
    <link rel="stylesheet" href="login.css">
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
    $SKU = '';
    $NAME = '';
    $Price = '';

    $BRAND = '';
    $DESC = '';
    $OPERATIONS = '';
    $BRAND_NAME = '';

    require_once "config.php";

    $sql = "SELECT * , brands.brand_name from products, brands where brands.brand_id=products.brand_id and products.id=$ID;";
    $result = mysqli_query($link, $sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $ID = $row['id'];
                $SKU = $row['sku'];
                $NAME = $row['name'];
                $Price = $row['price'];
                $IMAGE = $row['image'];
                $BRAND = $row['brand_id'];
                $BRAND_NAME = $row['brand_name'];
                $DESC = $row['description'];
            }
        } else {
            echo "not found";
        }
    }
    ?>

    <div id="container">
        <form id="login1-form" method="POST" enctype="multipart/form-data" action="addupdateaction.php?id=<?= $ID ?>">
            <h2>
                <?= $ID == "" ? 'add' : 'update'; ?>
            </h2>


            <div class="form-outline mb-2">
                <label class="form-label" for="form2Example1">NAME</label>
                <input type="text" id="form2Example1" name='name' class="form-control" value="<?= $NAME ?>" />
            </div>

            <div class="form-outline mb-2">
                <label class="form-label" for="form2Example1">SKU</label>
                <input type="text" id="form2Example1" name='sku' class="form-control" value="<?= $SKU ?>" />
            </div>

            <div class="form-outline mb-2">
                <label class="form-label" for="form2Example1">Price</label>
                <input type="text" id="form2Example1" name='price' class="form-control" value="<?= $Price ?>" />
            </div>

            <div class="form-outline mb-2">
                <label class="form-label" for="form2Example1">IMAGE</label>
                <?php if (isset($IMAGE)) { ?>
                    <img src="images/<?= $IMAGE ?>" alt="gr" srcset="" id='img' />
                    <button type="button" class='btn btn-danger' id="cng-btn" onclick="chng()">Change</button>
                    <input type="file" class="form-control d-none" name="image" id='image'>
                <?php } else { ?>
                    <input type="file" class="form-control" name="image">
                <?php }
                ?>
            </div>

            <div class="form-outline mb-2">
                <label class="form-label" for="form2Example1">BRAND</label>
                <select name="brand" class="form-control" value=<?= $BRAND ?>>
                    <option selected disabled value="">select</option>
                    <?php
                    $sql = 'select * from brands';
                    $result = mysqli_query($link, $sql);
                    if ($result)
                        while ($row = $result->fetch_assoc()) { ?>
                            <option <?php if ($row['brand_id'] == $BRAND)
                                echo 'selected'; ?> value=<?= $row['brand_id'] ?>><?= $row['brand_name'] ?></option>
                        <?php }

                    ?>
                </select>
            </div>
            <div class="form-outline mb-2 ">
                <label class="form-label" for="form2Example1">DESC</label>
                <input type="text" id="form2Example1" name='desc' class="form-control" value="<?= $DESC ?>" />
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