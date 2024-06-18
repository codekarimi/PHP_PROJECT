<?php

session_start();
include("./connection.php");

if (isset($_POST['login'])) {

    $uname = $_POST['uname'];
    $password = $_POST['pass'];

    $error = array();

    $q = "SELECT * FROM patient WHERE username='$uname' AND password ='$password'";
    $qq = mysqli_query($connect, $q);

    $row = mysqli_fetch_array($qq);


    //if both feilds are empty throw errrors
    if (empty($uname)) {
        $error['login'] = "Enter Username";
    } else if (empty($password)) {
        $error['login'] = "Enter Password";
    } elseif ($row['password'] != $password) {
        $error['login'] = "Wrong password";
    } 

    if (count($error) == 0) {
        $query = "SELECT * FROM patient WHERE username ='$uname' AND password ='$password'";

        $result = mysqli_query($connect, $query);

        if ($result) {
            echo "<script>alert('Done')</script>";

            $_SESSION['patient'] = $uname;

            header("Location:patient/index.php");
            exit();
        } else {
            echo "<script>alert('invalid Account')</script>";
        }
    }
}

if (isset($error)) {#display error if fields are empty
    $s = $error['login'];

    $show = '<h5 class="text-center alert alert-danger">' . $s . '.</h5>';
} else {
    $show = '';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Login</title>
</head>

<body style="background-image: url(http://localhost:8080/Hospital%20management%20system/img/patient.jpeg); background-size:cover;background-repeat:no-repeat">
    <?php
    include('./include/header.php');
    ?>

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
                <div class="col-md-6 jumbotron my-5">
                    <h5 class="text-center my-3">Doctor Login</h5>
                    <div>
                        <?php

                        echo $show;
                        ?>
                    </div>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="uname" id="" class="form-control" autocomplete="off" placeholder="Enter UserName" value="<?php #display username after refresh
                            if (isset($_POST['uname'])) {
                                echo $_POST['uname'];
                                } ?>">

                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="pass" id="" class="form-control" placeholder="Enter password" value="<?php #display firstname after refresh
                            if (isset($_POST['pass'])) {
                                echo $_POST['pass'];
                            }
                            ?>">
                            <br>
                            <input type="submit" value="Login" name="login" class="btn btn-info my-3">
                        </div>

                        <p>I dont have an account? <a href="account.php" style="text-decoration: none;">Apply Now!!!</a></p>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>

</body>

</html>