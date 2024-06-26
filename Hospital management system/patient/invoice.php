<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Invoice</title>
</head>

<body>

    <?php

    include('../connection.php');
    include('../include/header.php');
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php

                    include('../patient/sidenav.php')
                    ?>
                </div>
                <div class="col-md-10">
                    <h5 class="text-center">My Invoice</h5>
                    <?php

                    $pat=$_SESSION['patient'];

                    $query="SELECT * FROM patient WHERE username='$pat' ";

                    $res = mysqli_query($connect,$query);
                    $row=mysqli_fetch_array($res);

                    $fname= $row['firstname'];


                    $querys=mysqli_query($connect,"SELECT * FROM income WHERE patient='$fname' ");


                    $output = "";

                    $output .= '

 <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>DOCTOR</th>
            <th>PATIENT</th>
            <th>DATE DISCHARGED</th>
            <th>AMOUNT PAID</th>
            <th>DESCRIPTION</th>
            <th>ACTION</th>
        </tr>

';

                    if (mysqli_num_rows($querys) < 1) {
                        $output .= '
    
     <tr>
            <td colspan="10" class="text-center"> No Invoice yet.</td>
        </tr>


    ';
                    }

                    while ($row = mysqli_fetch_array($querys)) {
                        $output .= '
    
         <tr>
            <td>' . $row["id"] . '</td>
            <td>' . $row["doctor"] . '</td>
            <td>' . $row["patient"] . '</td>
            <td>' . $row["date_dis"] . '</td>
            <td>' . $row["amount_paid"] . '</td>
            <td>' . $row["description"] . '</td>
             <td>
             <a href="http://localhost:8080/Hospital%20management%20system/patient/checkinvoice.php?id='.$row['id'].'"><button class="btn btn-info">Check</button></a>
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