<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</head>


<body>
<?php
// Include config file

    $email = $_POST['email'];
    $password = $_POST['password'];
    // echo "$email";

    require_once "../config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = "SELECT * FROM admin where email='$email' and password='$password'";
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
          echo '<div class="alert alert-danger"><em>FOUND.</em></div>';
            while ($row = mysqli_fetch_array($result)) {
            mysqli_free_result($result);
        } 
    } else {
        echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
    }
}else {
    echo "Oops! Something went wrong. Please try again later.";
}

    // Close connection
    mysqli_close($link);
}
?>
</body>
</html>

