<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HMS home page</title>
</head>

<body>
    <?php
    include("include/header.php");  //page will appear after header.php

    ?>
    <div style="margin-top: 50px;"></div>

    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3 mx-1 shadow">
                    <img src="http://localhost:8080/Hospital%20management%20system/img/more information.jpeg" alt="" style="width: 100%;height:190px">
                    <h5 class="text-center">click on the button for more information</h5>
                    <a href="#">
                        <button class="btn btn-success" style="margin-left:30%">More!!!</button>
                    </a>
                </div>

                <div class="col-md-4 mx-1 shadow">
                    <img src="http://localhost:8080/Hospital%20management%20system/img/patient.jpeg" alt="" style="width: 100%;">
                    <h5 class="text-center">create account so that we can take good care of you</h5>
                    <a href="account.php">
                        <button class="btn btn-success" style="margin-left:20%">Create account!!!</button>
                    </a>
                </div>

                <div class=" col-md-4 mx-1 shadow">
                    <img src="http://localhost:8080/Hospital%20management%20system/img/docctor.jpeg" alt="" style="width: 100%;">

                    <h5 class="text-center">We are looking for doctors</h5>

                    <a href="apply.php">
                        <button class="btn btn-success" style="margin-left:30%">Apply now!!</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>