<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
</head>

<body>


    <?php

    include("../include/header.php");
    include("../connection.php");

    ?>


    <div class="container-fluid">
        <div class="col-md12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">

                    <?php
                    include("../patient/sidenav.php");
                    ?>

                </div>

                <div class="col-md-10">
                    <h5 class="text-center">Book Appointment</h5>
                    <?php

                    $pat = $_SESSION['patient'];
                    $sql = mysqli_query($connect, "SELECT * FROM patient WHERE username='$pat'");
                    $row = mysqli_fetch_array($sql);

                    $firstname = $row['firstname'];
                    $surname = $row['surname'];
                    $gender = $row['gender'];
                    $phone = $row['phone'];


                    if (isset($_POST['book'])) {

                        $date = $_POST['date'];
                        $symp = $_POST['symptom'];

                        if (empty($date)) {
                            # code...
                        } else if (empty($symp)) {
                            
                        } else {

                            $query = "INSERT INTO appointment (firstname,surname,gender,phone, appointment_date,symptoms,status,date_booked) VALUES('$firstname','$surname','$gender','$phone','$date','$symp','pending',NOW())";

                            $res = mysqli_query($connect, $query);

                            if ($res) {
                                echo "<script> alert('You have booked an appointment') </script>";
                            } else {
                                echo "<script> alert('try again') </script>";
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

                            <div class="col-md-6 jumbotron">
                                <form action="" method="post">
                                    <label for="">Appointment Date</label>
                                    <input type="date" name="date" id="" class="form-control">

                                    <label for="">Symptoms</label>
                                    <input type="text" name="symptom" id="" class="form-control" autocomplete="off" placeholder="Enter Your Symptoms">
                                    <br>
                                    <input type="submit" value="Book Apointment" class="btn btn-info" name="book">
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