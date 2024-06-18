<?php

session_start();

error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors Profile</title>
</head>

<body>
    <?php

    include('../include/header.php');

    ?>



    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php

                    include('../doctor/sidenav.php');
                    include('../connection.php');

                    ?>

                </div>
                <div class="col-md-10">
                    <div class="container-fluid">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php
                                    $doc = $_SESSION['doctor'];

                                    $query = "SELECT * FROM doctors WHERE username='$doc'";

                                    $res = mysqli_query($connect, $query);

                                    $row = mysqli_fetch_array($res);

                                    if (isset($_POST['upload'])) {

                                        $img = $_FILES['img']['name'];

                                        if (empty($img)) {
                                        } else {
                                            $que = "UPDATE doctors SET profile='$img' WHERE  username='$doc' ";

                                            $result = mysqli_query($connect, $que);

                                            if ($result) {
                                                #$des= "C:/xampp/htdocs/Hospital management system/admin/img".$profile;
                                                $img = $_FILES['img']['tmp_name'];
                                                move_uploaded_file($img, "C:/xampp/htdocs/Hospital management system/admin/img/" . $img);
                                            }
                                        }
                                    }


                                    ?>

                                    <form action="" method="post" enctype="multipart/form-data">
                                        <?php

                                        echo '<img src="http://localhost:8080/Hospital%20management%20system/doctor/img/' . $row["profile"] . '" style="height:250px;" class="col-md-12 my-3">'

                                        ?>

                                        <input type="file" name="img" id="" class="form-control">
                                        <br>
                                        <input type="submit" value="Update profile" name="upload" class="btn btn-success">

                                    </form>

                                    <div class="my-3">

                                        <table class="table table-bordered">
                                            <tr>
                                                <th class="text center" colspan="2">Details</th>
                                            </tr>
                                            <tr>
                                                <th>Firstname</th>
                                                <th><?php echo $row['firstname'];  ?></th>
                                            </tr>
                                            <tr>
                                                <th>Surname</th>
                                                <th><?php echo $row['surname']  ?></th>
                                            </tr>
                                            <tr>
                                                <th>Username</th>
                                                <th><?php echo $row['username']  ?></th>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <th><?php echo $row['email']  ?></th>
                                            </tr>
                                            <tr>
                                                <th>Gender</th>
                                                <th><?php echo $row['gender']  ?></th>
                                            </tr>
                                            <tr>
                                                <th>Country</th>
                                                <th><?php echo $row['country']  ?></th>
                                            </tr>
                                            <tr>
                                                <th>Phone</th>
                                                <th><?php echo $row['phone']  ?></th>
                                            </tr>
                                            <tr>
                                                <th>Salary</th>
                                                <th><?php echo $row['salary']  ?></th>
                                            </tr>


                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="text-center">Change Username</h5>
                                    <?php


                                    if (isset($_POST['change'])) {

                                        $username = $_POST['uname'];

                                        $error = array();

                                        if (empty($username)) {
                                            $error['u'] = "Enter Username Please";
                                        } else {

                                            $query = "UPDATE doctors SET username='$username' WHERE username='$doc'";

                                            $res = mysqli_query($connect, $query);

                                            if ($res) {
                                                $_SESSION['doctor'] = $username;
                                            }
                                        }
                                    }

                                    if (isset($error['u'])) {
                                        $e = $error['u'];

                                        $show = "<h5 class ='text-center alert alert-danger'>$e</h5>";
                                    } else {
                                        $show = "";
                                    }

                                    ?>
                                    <form action="" method="post">
                                        <div>
                                            <?php
                                            echo $show;
                                            ?>
                                        </div>
                                        <label for="">Update Username</label>
                                        <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                                        <br>
                                        <input type="submit" value="Change Username" name="change" class="btn btn-success">
                                    </form>

                                    <br><br>
                                    <h5 class="tex-center my-2">Change Password</h5>
                                    <?php
                                    if (isset($_POST['change_pass'])) {

                                        $old_pass = $_POST["old_pass"];
                                        $new_pass = $_POST['new_pass'];
                                        $con_pass = $_POST['con_pass'];


                                        $error = array();

                                        $que = "SELECT * FROM doctors WHERE username='$doc'";
                                        $old = mysqli_query($connect, $que);

                                        $row1 = mysqli_fetch_array($old);
                                        $pass = $row1['password'];

                                        #display errors when password input are empty
                                        if (empty($old_pass)) {
                                            $error['p'] = "Enter old password";
                                        } else if (empty($new_pass)) {
                                            $error['p'] = "Enter  new password";
                                        } else if (empty($con_pass)) {
                                            $error['p'] = "Enter Confirm  password";
                                        } else if ($old_pass != $pass) {
                                            $error['p'] = "Invalid Password";
                                        } elseif ($new_pass != $con_pass) {
                                            $error['p'] = "Both Password doesnt match";

                                            // if (count($error) == 0) {

                                            //     $query = "UPDATE doctors SET password='$new_pass' WHERE username='$doc'";

                                            //     mysqli_query($connect, $query);
                                            // }
                                        }

                                        if (count($error) == 0) {

                                                $query = "UPDATE doctors SET password='$new_pass' WHERE username='$doc'";

                                                mysqli_query($connect, $query);
                                            }
                                    }

                                    if (isset($error['p'])) {
                                        $e = $error['p'];

                                        $show = "<h5 class ='text-center alert alert-danger'>$e</h5>";
                                    } else {
                                        $show = "";
                                    }
                                    ?>
                                    <form action="" method="post">
                                        <div>
                                            <?php
                                            echo $show;
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Old Password</label>
                                            <input type="password" name="old_pass" class="form-control" autocomplete="off" placeholder="Enter Old Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="">New Password</label>
                                            <input type="password" name="new_pass" class="form-control" autocomplete="off" placeholder="Enter Old Password">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Confirm Password</label>
                                            <input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Confirm Password">
                                        </div>
                                        <br>
                                        <input type="submit" value="Change Password" name="change_pass" class="btn btn-success">

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>



</html>