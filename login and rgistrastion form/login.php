<?php

//if user is logined in will direct to dashboard page
session_start();
if (isset($_SESSION["user"])) {
    header("location:index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="http://localhost:8080/login%20and%20rgistrastion%20form/style.css" type="text/css">
</head>

<body>

    <div class="container">

        <?php
        if (isset($_POST["login"])) {
            $email
                = $_POST["email"];
            $password
                = $_POST["password"];

            require_once "database.php";

            $sql = "SELECT * FROM users WHERE Email ='$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["Password"])) {

                    session_start();
                    //allowin only logined user to access the dashboars
                    $_SESSION["user"] = "yes";
                    header("location: index.php");
                    die();
                } else {
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }

        ?>
        <form action="login.php" method="post">
            <div class="form-group">
                <input type="email" name="email" id="" class="form-control" placeholder="Enter email">
            </div>
            <div class="form-group">
                <input type="password" name="password" id="" class="form-control" placeholder="Enter password">
            </div>
            <div class="form-btn">
                <input type="submit" name="login" value="Login" class="btn btn-primary">
            </div>
        </form>

        <div>
            <p>Not registered yet <a href="/registration.php">Click here</a></p>
        </div>
    </div>


</body>

</html>