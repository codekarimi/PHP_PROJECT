<?php

session_start();
include('connection.php');


if (isset($_POST["login"])) { #updating the admin login

    $username = $_POST['uname'];
    $password = $_POST['pass'];

    $error = array();

    //if both feilds are empty throw errrors
    if (empty($username)) {
        $error['admin'] = "Enter Username";
    } else if (empty($password)) {
        $error['admin'] = "Enter Password";
    }

    if (count($error) == 0) { #login if details are collect

        $query = "SELECT * FROM amin WHERE username='$username' AND password='$password'";

        $result = mysqli_query($connect, $query); #mysqli_query() function performs a query against a database.

        if (mysqli_num_rows($result) == 1) { #mysqli_num_rows() function returns the number of rows in a result set.
            echo "<script>alert('You have Logined as and admin')</script>";

            $_SESSION['admin'] = $username; #this link explain php sessions(https://www.w3schools.com/php/php_sessions.asp)

            header("Location:admin/index.php");
            exit();
        } else {
            echo "<script>alert('Invalid Username')</script>";
        }
    } //count return n.o of element in an arrray
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <title>Admin login page </title>
</head>

<body style="background-image:url(http://localhost:8080/Hospital%20management%20system/img/hospital.jpeg);background-size:cover">

    <?php
    include("include/header.php");  //page will appear after header.php

    ?>


    <div style="margin-top: 60px;"></div>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>
                <style type="text/css">
                    .jumbotron {
                        padding: 4rem 2rem;
                        margin-bottom: 2rem;
                        background-color: var(--bs-light);
                        border-radius: .3rem;
                    }
                </style>
                <div class="col-md-6 jumbotron">
                    <img src="http://localhost:8080/Hospital%20management%20system/img/adminlogo.jpeg" alt="" class="col-md-12">
                    <form action="" method="post" class="my-2">
                        <div>
                            <?php  #what will be display with missing username and password
                            if (isset($error['admin'])) {
                                $sh = $error['admin'];

                                $show = "<h4 class='alert alert-danger'>$sh</h4>";
                            } else {
                                $show = "";
                            }

                            echo $show;

                            ?>
                        </div>
                        <div class="form-group">
                            <label for="" class="text-white">Username</label>
                            <input type="text" name="uname" class="form-control" id="" autocomplete="off" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label for="" class="text-white">Password</label>
                            <input type="password" name="pass" id="" class="form-control" placeholder="Enter password">
                        </div>
<br>
                        <input type="submit" value="Login" name="login" class="btn btn-success ">
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>

</body>

</html>