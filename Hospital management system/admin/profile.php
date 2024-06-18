<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
</head>

<body>
    <?php

    include("../include/header.php");
    include("../connection.php");

    $ad = $_SESSION['admin'];


    $query = "SELECT * FROM amin WHERE username='$ad'";
    $res = mysqli_query($connect, $query);

    while ($row = mysqli_fetch_array($res)) { #fetching data from database

        $user = $row['username'];
        $profiles = $row['profile'];
    }
    ?>

    <div class="container-fliud">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php

                    include('../admin/sidenav.php');
                    ?>
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h4><?php echo $user;    ?> Profile</h4>

                                <?php

                                if (isset($_POST['update'])) {

                                    $profiles = $_FILES['profile']['name'];

                                    if (empty($profiles)) {
                                    } else {
                                        $query = 'UPDATE amin set profile="$profiles" WHERE username="$ad"';
                                        $result = mysqli_query($connect, $query);

                                        if ($result) {
                                            #$des= "C:/xampp/htdocs/Hospital management system/admin/img".$profile;
                                            $file = $_FILES['profile']['tmp_name'];
                                            move_uploaded_file($file, 'C:/xampp/htdocs/Hospital management system/admin/img/' . $profiles);
                                        }
                                    }
                                }
                                ?>


                                <form action="" method="post" enctype="multipart/form-data">
                                    <?php

                                    #display images
                                    echo "<img src='http://localhost:8080/Hospital%20management%20system/admin/img/$profiles' class='col-md-12'  style='height:250px'";

                                    ?>

                                    <br><br>
                                    <div class="form-group">
                                        <label for="">UPDATE PROFILE</label>
                                        <input type="file" name="profile" id="" class="form-control">
                                    </div>
                                    <br>
                                    <input type="submit" value="UPDATE" name="update" class="btn btn-success">
                                </form>

                                <br><br>


                            </div>
                            <div class="col-md-6">
                                <?php
                                #changing username
                                if (isset($_POST['change'])) {

                                    $uname = $_POST['uname'];

                                    if (empty($uname)) {
                                        # code...
                                    } else {
                                        $quer = "UPDATE amin SET username='.$uname.' WHERE username='$ad'";
                                        $res = mysqli_query($connect, $quer);

                                        if ($res) {
                                            $_SESSION['admin'] = $uname;
                                        }
                                    }
                                }

                                ?>
                                <form action="" method="post">

                                    <label for="">Change Username</label>
                                    <input type="text" name="uname" id="" class="form-control" autocomplete="off">
                                    <br>
                                    <input type="submit" value="Change Username" name="change" class="btn btn-success">
                                </form>

                                <br>
                                <?php

                                if (isset($_POST['update'])) {

                                    $old_pass = $_POST["oldPass"];
                                    $new_pass = $_POST['new_Pass'];    
                                    $con_pass = $_POST['con_Pass'] ?? "";

                                    $error = array();

                                    $que= "SELECT * FROM amin WHERE username='$ad'";
                                    $old = mysqli_query($connect, $que);

                                    $row = mysqli_fetch_array($old);
                                    $pass = $row['password'] ?? "";

                                    #display errors when password input are empty
                                    if (empty($old_pass)) {
                                        $error['p'] = "Enter old password";
                                    } else if (empty($new_pass)) {
                                        $error['p'] = "Enter  new password";
                                    } else if (empty($con_pass)) {
                                        $error['p'] = "Enter Confirm  password";
                                    } else if ($oldpass != $pass) {
                                        $error['p'] = "Invalid Password";
                                    } elseif ($new_pass != $con_pass) {
                                        $error['p'] = "Both Password doesnt match";
                                }
                                
                                    if (count($error) == 0) {

                                        $query = "UPDATE amin SET password='$new_pass' WHERE username='$ad'";

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


                                    <h5 class="text-centre">Change Password</h5>
                                    <div>
                                        <?php

                                        echo $show;
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Old Password</label>
                                        <input type="password" name="oldpass" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">New Password</label>
                                        <input type="password" name="new_pass" id="" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Confirm Password</label>
                                        <input type="password" name="con_pass" id="" class="form-control">
                                    </div>
                                    <input type="submit" value="Change Password" name="update" class="btn btn-info">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>