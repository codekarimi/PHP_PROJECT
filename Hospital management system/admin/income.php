<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Income</title>
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
                    include('../admin/sidenav.php');
                    ?>
                </div>
                <div class="col-md-10">
                    <h5 class="text-center"></h5>

                    <?php

                    $query = "SELECT * FROM income";

                    $res = mysqli_query($connect, $query);

                    $output = "";

                    $output .= '

 <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Doctor</th>
            <th>Patient</th>
            <th>Date Discharged</th>
            <th>Fee</th>
            <th>Amount Patient</th>

        </tr>

';

                    if (mysqli_num_rows($res) < 1) {
                        $output .= '
    
     <tr>
            <td colspan="4" class="text-center"> No patient Discharaged yet </td>
        </tr>


    ';
                    }

                    while ($row = mysqli_fetch_array($res)) {
                        $output .= '
    
         <tr>
            <td>' . $row["id"] . '</td>
            <td>' . $row["doctor"] . '</td>
            <td>' . $row["patient"] . '</td>
            <td>' . $row["date_dis"] . '</td>
            <td>' . $row["amount_paid"] . '</td>
            <td>
           <a href="http://localhost:8080/Hospital%20management%20system/admin/edit.php?id=' . $row['id'] . '"><button class="btn btn-info">Edit</button></a>
            </td>
       
    ';
                    }

                    $output .= "

 </tr>
</table>
";

                    echo  $output;
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>