<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Invoice</title>
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
                    <h5 class="text-center my-3">View Invoice</h5>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <?php

                                if (isset($_GET['id'])) {
                                    # code...
                                    $id = $_GET['id'];

                                    $query = "SELECT * FROM income WHERE id='$id'";
                                    $res = mysqli_query($connect, $query);
                                    $row = mysqli_fetch_array($res);
                                }
                                ?>

                                <table class="table table-bordered">
                                    <tr>
                                        <th class="text-center" colspan="2">INVOICE</th>
                                    </tr>
                                    <tr>
                                        <td>Doctor</td>
                                        <td><?php echo $row['doctor'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Patient</td>
                                        <td><?php echo $row['patient'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Date discharged</td>
                                        <td><?php echo $row['date_dis'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>amount_paid</td>
                                        <td><?php echo $row['amount_paid'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td><?php echo $row['description'] ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                </div>
            </div>
</body>

</html>