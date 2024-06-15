<?php

session_start();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- fontawesome cdn  -->
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <title>Admin DashBoard</title>
</head>

<body>
    <?php
    include('../include/header.php');
    include('../connection.php');
    ?>


    <div class="container-fluild">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2 " style="margin-left: -30px;">

                    <?php

                    include('sidenav.php');


                    ?>

                </div>
                <div class="col-md-10 ">

                    <h4 class="my-2">Admin DashBoard</h4>
                    <div class="col-md-12 my-1">
                        <div class="row">
                            <div class="col-md-3 bg-success mx-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php
                                            $ad = mysqli_query($connect, "SELECT * FROM amin");
                                            $num = mysqli_num_rows($ad);

                                            echo '<h5 class="my-2 text-white text-center" style="font: size 30px;">' . $num . '</h5>';
                                            ?>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Admin</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="http://localhost:8080/Hospital%20management%20system/admin/admin.php"><i class="fas fa-users-cog fa-3x my-4" style="color:white"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-info mx-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php
                                        #code displaying nu,ber of approved Doctors
                                            $doctors =mysqli_query($connect,"SELECT * FROM doctors WHERE status='Approved'");

                                            $num2=mysqli_num_rows($doctors);
                                            
                                            ?>
                                            <h5 class="my-2 text-white text-center" style="font: size 30px;"><?php
                                            echo $num2;
                                            ?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Doctors</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="http://localhost:8080/Hospital%20management%20system/admin/doctor.php"><i class="fa-solid fa-user-doctor fa-3x my-4" style="color:white"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-warning mx-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="my-2 text-white text-center" style="font: size 30px;">0</h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Patient</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="#"><i class="fas fa-procedures fa-3x my-4" style="color:white"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 bg-danger mx-2 my-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="my-2 text-white text-center" style="font: size 30px;">0</h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Report</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="#"><i class="fas fa-flag fa-3x my-4" style="color:white"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 bg-success mx-2 my-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php
                                            
                                            $job=mysqli_query($connect,"SELECT * FROM doctors WHERE status='Pending'");

                                            $num1=mysqli_num_rows($job);
                                            
                                            ?>
                                            <h5 class="my-2 text-white text-center" style="font: size 30px;"><?php
                                            echo $num1;
                                            ?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Job Request</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="http://localhost:8080/Hospital%20management%20system/admin/job_request.php"><i class="fas fa-book-open fa-3x my-4" style="color:white"></i></a>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 bg-warning mx-2 my-2" style="height: 130px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="my-2 text-white text-center" style="font: size 30px;">0</h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Income</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="#"><i class="fas fa-money-check-alt fa-3x my-4" style="color:white"></i></a>
                                        </div>
                                    </div>
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