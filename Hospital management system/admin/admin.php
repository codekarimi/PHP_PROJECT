<?php
session_start();  #to store information on browwser
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>
    <?php
    include("../include/header.php");  //page will appear after header.ph
    include("../connection.php");
    ?>


    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                    include('sidenav.php');

                    ?>
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="text-center">All Admin</h5>


                                <?php
                                $ad = $_SESSION["admin"];
                                $query = "SELECT * FROM amin WHERE username !='$ad'";
                                $res = mysqli_query($connect, $query);

                                $output = '
                            <table class="table table-bordered">
                           <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th style="width: 10%;">Action</th>
                        
                                <tr>
                            ';

                                if (mysqli_num_rows($res) < 1) {
                                    $output .= '<tr><td colspan="2" class="text-center">No New admin </td></tr>';
                                }

                                while ($row = mysqli_fetch_array($res)) { #we fetching data from mysql to display on our admin 
                                    $id = $row['ID'];
                                    $username = $row['username'];

                                    $output .= "
                                  <tr>
                                    <td>$id</td>
                                    <td>$username</td>
                                    <td>
                                    <a href='http://localhost:8080/Hospital%20management%20system/admin/admin.php?id='.$id.'><button id='' class='btn btn-danger
                                    remove'> Remove</button></a>  
                                    </td>";
                                }

                                $output .= '
                              </tr>

                            </table>
                            ';

                                echo $output;


                                if (isset($_GET['id'])) {#deleting user

                                    $id= $_GET['id'];

                                    $query="DELETE FROM amin WHERE ID='$id'";
                                    mysqli_query($connect,$query);
                                }
                                ?>




                            </div>
                            <div class="col-md-6">
                                <?php

                                if (isset($_POST['add'])) {
                                    
                                    $uname =$_POST['uname'];
                                    $pass =$_POST['pass'];
                                    $image =$_FILES['img'];

                                    $error = array();#array to display error

                                    if (empty($uname)) {
                                        $error['u']="Enter Username";
                                    }else if (empty($pass)){
                                        $error['u'] = "Enter Password";
                                    }elseif(empty($image)){
                                        $error['u'] = "Add Admin Profile";
                                    }

                                    if (count($error) ==0) {
                                        $q="INSERT INTO amin (username,password,profile) VALUES ('$uname','$pass','$image')";#adding and admin
                                    
                                    $result=mysqli_query($connect,$q);

                                    if ($result) {
                                        $upload= $_FILES['img']['tmp_name'];
                                        move_uploaded_file($upload,
                                                'C:/xampp/htdocs/Hospital management system/admin/img/'.$image['name']);
                                                
                                                // The move_uploaded_file() function moves an uploaded file to a new destination.Note: This function only works on files uploaded via PHP's HTTP POST upload mechanism.Note: If the destination file already exists, it will be overwritten.
                                    
                                    }else{

                                    }

                                }
                                
                            }

                                        // $er =$error['u'];

                                        if (isset($error['u'])) {
                                            $er = $error['u'];

                                            $show = '<h5 class="text-center alert alert-danger">'.$er.'</h5>';
                                        } else {
                                            $show = '';
                                        }

                           
                                ?>
                                <h5 class="text-center">Add Admin</h5>

                                <form action="" method="post" enctype="multipart/form-data">
                                    <div>
                                        <?php
                                        echo $show;
                                        ?>
                                    </div>

                                    <!-- <form action="" method="post" enctype="multipart/form-data">enctype attribute specifies how the form-data should be encoded when submitting it to the server.Note: The enctype attribute can be used only if method="post". -->
                                    <div class="from-group">
                                        <label for="">Username</label>
                                        <input type="text" name="uname" id="" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="from-group">
                                        <label for="">Password</label>
                                        <input type="password" name="pass" id="" class="form-control">
                                    </div>
                                    <div class="from-group">
                                        <label for="">Add Admin Picture</label>
                                        <input type="file" name="img" id="" class="form-control">
                                    </div>
                                    <br>
                                    <input type="submit" value="Add New Admin" name="add" class="btn btn-success">
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