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

    $ad=$_SESSION['admin'];


    $query="SELECT * FROM amin WHERE username='$ad'";
    $res = mysqli_query($connect,$query);

    while ($row=mysqli_fetch_array($res)) {#fetching data from database
        
        $username=$row['username'];
        $profile=$row['profile'];
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
                                <h4><?php echo $username;  ?> Profile</h4>

                                <?php

                                if (isset($_POST['update'])) {
                                    
                                    $profile=$_FILES['profile'];



                                    if (empty($profile)) {

                                    }else{
                                        $query='UPDATE amin set profile="$profile" WHERE username="$ad"';
                                        $result=mysqli_query($connect,$query);

                                        if ($result) {
                                            #$des= "C:/xampp/htdocs/Hospital management system/admin/img".$profile;
                                            $file= $_FILES['profile']['tmp_name'];
                                            move_uploaded_file($file, 'C:/xampp/htdocs/Hospital management system/admin/img/' .$profile['name']);
                                        }
                                    }
                                }
                                ?>


                                <form action="" method="post" enctype="multipart/form-data">
                                    <?php
                                 
                                   echo '<img src="/admin/img/$profile"  class="col-md-12"  style="height:250px"';                                

                                  ?>

                                  <br><br>
                                  <div class="form-group">
                                    <label for="">UPDATE PROFILE</label>
                                    <input type="file" name="profile" id="" class="form-control">
                                  </div>
                                  <br>
                                  <input type="submit" value="UPDATE" name="update" class="btn btn-success">
                                </form>
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>