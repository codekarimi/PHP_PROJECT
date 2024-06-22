<?php

include('./connection.php');

if (isset($_POST['create'])) {

    $firstname = $_POST['fname'];
    $surname = $_POST['sname'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $password = $_POST['pass'];
    $confirm_password = $_POST['conpass'];

    $error = array();

    if (empty($firstname)) {
        $error['create'] = "Enter firstname";
    } else if (empty($surname)) {
        $error['create'] = "Enter surname";
    } else if (empty($username)) {
        $error['create'] = "Enter username";
    } else if (empty($email)) {
        $error['create'] = "Enter Email Adreess";
    } else if (empty($phone)) {
        $error['create'] = "Enter phone N.o";
    } else if (empty($gender)) {
        $error['create'] = "Select gender";
    } else if (empty($country)) {
        $error['create'] = "Select country";
    } else if (empty($password)) {
        $error['create'] = "Enter password";
    } else if (empty($confirm_password)) {
        $error['create'] = "Confirm Password";
    } else if ($confirm_password != $password) {
        $error['create'] = "Both password do not match";
    }else if(count($error) == 0) {
        $query = "INSERT INTO patient(firstname,surname,username,email,gender,phone,country,password,date_reg,profile)  VALUES('$firstname','$surname','$username','$email','$gender','$phone','$country','$password',NOW(),'patient.jpeg')";

        $result = mysqli_query($connect, $query);

        if ($result) {
            echo "<script> alert('You have succefully Aplied') </script>";

            header('Location:patientlogin.php');
        } else {
            echo "<script> alert('Failed') </script>";
        }
    }



}

    

if (isset($error)) {
    $s = $error['create'];

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
    <title>Create Account</title>
</head>

<body style="background-image: url(http://localhost:8080/Hospital%20management%20system/img/hospital1.jpeg); background-size:cover;background-repeat:no-repeat">

    <?php
    include('./include/header.php');
    ?>


    <div class="container-fluid">
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
                <div class="col-md-6 my-2 jumbotron">
                    <h5 class="text-center text-info-my-2">Create Account</h5>
                    <div>
                        <?php
                        echo $show;
                        ?>
                    </div>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">Firstname</label>
                            <input type="text" name="fname" id="" class="form-control" autocomplete="off" placeholder="Enter Firsttname">
                        </div>
                        <div class="form-group">
                            <label for="">Surname</label>
                            <input type="text" name="sname" id="" class="form-control" autocomplete="off" placeholder="Enter Surname">
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="uname" id="" class="form-control" autocomplete="off" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" id="" class="form-control" autocomplete="off" placeholder="Enter Email Address">
                        </div>
                       
                        <div class="form-group">
                            <label for="">Gender</label>
                            <select name="gender" id="" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Phone NO</label>
                            <input type="number" name="phone" id="" class="form-control" autocomplete="off" placeholder="Enter phone number ">
                        </div>
                        <div class="form-group">
                            <label for="">Country</label>
                            <select name="country" class="form-control">
                                <option value="">Select Country</option>
                                <option value="Russia">Russia</option>
                                <option value="india">india</option>
                                <option value="Ghana">Ghana</option>
                                <option value="Kenya">Kenya</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="pass" id="" class="form-control" autocomplete="off" placeholder="Enter Password">
                        </div>

                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="password" name="conpass" id="" class="form-control" autocomplete="off" placeholder="Enter confirmed Password">
                        </div>
                        <br>
                        <input type="submit" value="Create Account" name="create" class="btn btn-info">
                        <br>
                        <p>I already have an account <a href="patientlogin.php">click to Login</a></p>



                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>

</html>