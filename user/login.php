<!DOCTYPE html>
<html lang="en">
<?php
$loc = $_SERVER['HTTP_REFERER']?$_SERVER['HTTP_REFERER']:'/mobileshop/index.php';
 session_start();
 if(isset($_SESSION['user'])){
        //  header('location:../index.php ');
        echo "<script>location.href='$loc';</script>";
 }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER Login</title>
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
    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];
    // echo "$email";
    
    require "../config.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $locat = $_GET['red'];
        $result = $product->userlogin($email);
        if (mysqli_num_rows($result) > 0) {
            $row = $result->fetch_assoc();
            echo $password;
            if ($password == $row['password']) {
                $_SESSION["user"] = $row["id"];
                // echo "<script>location.href='$loc';</script>";
                
                header("Location: $locat");
            } else {
                echo "<script>alert('wrong password');location.href='login.php'</script>";
            }
        } else {
            echo "<script>alert('user email not valid');location.href='login.php'</script>";
        }


        // Close connection
        mysqli_close($link);
    }
    ?>
    <div id="container">
        <form id="login-form" method="POST" action="login.php?red=<?=$loc?>">
            <h2>LOGIN</h2>
            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example1">Email address</label>
                <input type="email" id="form2Example1" name='email' class="form-control" required />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="form2Example2">Password</label>
                <input type="password" id="form2Example2" name='password' class="form-control" required />
            </div>
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
        </form>
        <div>
</body>

</html>