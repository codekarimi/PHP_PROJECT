<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Login Page</title>
</head>

<body style="background-image: url(http://localhost:8080/Hospital%20management%20system/img/hospital1.jpeg); background-size:cover;background-repeat:no-repeat">
    <?php

    include("./include/header.php");
    ?>

    <div class="container">
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
                <div class="col-md-6 jumbotron my-3">
                    <h5 class="text-center my-2">Doctor Login</h5>

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="uname" id="" class="form-control" autocomplete="off" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" name="pass" id="" class="form-control" placeholder="Enter password">
                            <br>
                            <input type="submit" value="Submit" name="login" class="btn btn-success">
                        </div>

                        <p>I dont have an account? <a href="apply.php" style="text-decoration: none;">Apply Now!!!</a></p>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>


</body>

</html>