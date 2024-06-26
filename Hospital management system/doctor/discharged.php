<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Patient Appointment</title>
</head>

<body>

    <?php

    include('../include/header.php');
    include('../connection.php');
    ?>


    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">

                    <?php

                    include('../doctor/sidenav.php');
                    ?>
                </div>
                <div class="col-md-10">
                    <h5 class="text-center my-2">Total Appointment</h5>

                    <?php

                    if (isset($_GET['id'])) {

                        $id = $_GET['id'];

                        $query = "SELECT * FROM appointment WHERE id='$id' ";

                        $res = mysqli_query($connect, $query);

                        $row = mysqli_fetch_array($res);
                    }


                    ?>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6 my-3">
                                <table class="table table-bordered">
                                    <tr>
                                        <td class="text-center" colspan="2">Appointment Detail</td>
                                    </tr>
                                    <tr>
                                        <td>Firstname</td>
                                        <td><?php echo $row['firstname']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Surname</td>
                                        <td><?php echo $row['surname']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Gender</td>
                                        <td><?php echo $row['gender']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td><?php echo $row['phone']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Appointment Date</td>
                                        <td><?php echo $row['appointment_date']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Symptoms</td>
                                        <td><?php echo $row['symptoms']; ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-center my-1">Invoice</h5>
                                <?php

                                if (isset($_POST['send'])) {
                                        # code...
                                        $fee=$_POST['fee'];
                                        $des=$_POST['des'];


                                        if (empty($fee)) {
                                            # code...
                                        }else if(empty($des)){

                                        }else {

                                            $doc =$_SESSION['doctor'];
                                            $patient=$row['firstname'];


                                            $query = "INSERT INTO income (doctor,patient,date_dis,amount_paid,description) VALUES('$doc','$patient',NOW(),'$fee','$des')";
                                            
                                            $result=mysqli_query($connect,$query);

                                            if ($result) {
                                                # code...
                                                echo '<script> alert("YOU HAVE SENT INVOICE")</script>';

                                                mysqli_query($connect,"UPDATE appointment SET status='discharged' WHERE id ='$id'");
                                            }else {
                                                # code...
                                                echo '<script> alert("NO INVOICE SET")</script>';
                                            }

                                        }
                                    }
                                

                                ?>

                                <form action="" method="post">
                                    <label for="">Fees</label>
                                    <input type="number" name="fee" id="" class="form-control" autocomplete="off" placeholder="Enter Patient Feees">

                                    <label for="">Description</label>
                                    <input type="text" name="des" id="" class="form-control" autocomplete="off" placeholder="Enter Description">

                                    <input type="submit" value="Submit" class="btn btn-info my-3" name="send">
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