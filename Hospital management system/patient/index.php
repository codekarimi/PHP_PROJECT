<?php

session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
</head>

<body>
    <?php
    include('../include/header.php');
    include('../connection.php');

    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left:-30px">
                    <?php
                    include('../patient/sidenav.php');

                    ?>
                </div>
                <div class="col-md-10">
                    <div class="container-fluid">
                        <h5 class="">Patient's DashBoard</h5>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="row">
                                    <div class="col-md-3 bg-info mx-2" style="height:150px">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h5 class="text-white my-4">My profile</h5>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="">
                                                        <i class="fa fa-user-circle fa-3x my-4" style="color: white;"></i>

                                                        <!-- <img src="<?php
                                                    
                                                        ?>" alt="" class="my-4" style="margin-left: -20px; border-radius: 50%; width: 90px;"> -->
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 bg-warning mx-2" style="height:150px">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h5 class="text-white my-4">Book Appointment</h5>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="">
                                                        <i class="fa-solid fa-calendar-days fa-3x my-4" style="color: white;"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 bg-success mx-2" style="height:150px">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h5 class="text-white my-4">My Invoice</h5>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="">
                                                        <i class="fa-solid fa-file-invoice fa-3x my-4" style="color: white;"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <?php

                    if (isset($_POST['send'])) {
                        $title = $_POST['title'];
                        $message = $_POST['message'];
                        $user = $_SESSION['patient'];

                        $error = array();

                        if (empty($title)) {
                            $error['p'] = "Enter Title";
                        } elseif (empty($message)) {
                            $error['p'] = "Enter Message....";
                        } else {
                            $query = "INSERT INTO report(title,message,username,date_sent) VALUES('$title','$message','$user',NOW())";

                            $res = mysqli_query($connect, $query);

                            if ($res) {
                                echo "<script>alert('You have sent your Report')</script>";
                            }
                        }
                    }

                    ?>
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
                            <div class="col-md-6 jumbotron bg-info my-5">
                                <h5 class="text-center my-2">Send A Report</h5>
                                <form action="" method="post">
                                    <label for="">Title</label>
                                    <input type="text" name="title" id="" autocomplete="off" class="form-control" placeholder="Enter Title Of the report">

                                    <label for="">Message</label>
                                    <input type="text" name="message" id="" class="form-control" placeholder="Enter Message">

                                    <input type="submit" value="Send Report" name="send" class="btn btn-success my-2">
                                </form>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>