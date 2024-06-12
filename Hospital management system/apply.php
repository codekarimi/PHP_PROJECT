<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply Now</title>
</head>

<body style="background-image: url(http://localhost:8080/Hospital%20management%20system/img/hospital1.jpeg); background-size:cover;background-repeat:no-repeat">
    <?php
    include('./include/header.php');
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3"></div>

                <div class="col-md-6 my-3 jumbotron">
                    <style type="text/css">
                        .jumbotron {
                            padding: 4rem 2rem;
                            margin-bottom: 2rem;
                            background-color: var(--bs-light);
                            border-radius: .3rem;
                        }
                    </style>
                    <h5 class="text-center">Apply Now!</h5>

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">FirstName</label>
                            <input type="text" name="fname" id="" class="form-control" autocomplete="off" placeholder="Enter firstname">
                        </div>
                        <div class="form-group">
                            <label for="">Surname</label>
                            <input type="text" name="sname" id="" class="form-control" autocomplete="off" placeholder="Enter firstname">
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" name="uname" id="" class="form-control" autocomplete="off" placeholder="Enter firstname">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" id="" class="form-control" autocomplete="off" placeholder="Enter Email adress">
                        </div>
                        <div class="form-group">
                            <label for="">Select gender</label>
                            <select name="gender" id="" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <input type="number" name="phone" id="" class="form-control" autocomplete="off" placeholder="Enter Phone Number">
                        </div>
                        <div class="form-group">
                            <label for="">Country</label>
                            <select name="gender" id="" class="form-control">
                                <option value="">Select Country</option>
                                <option value="Russia">Russia</option>
                                <option value="india">india</option>
                                <option value="Ghana">Ghana</option>
                                <option value="Kenya">Kenya</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" name="pass" id="" class="form-control" autocomplete="off" placeholder="Enter Password">
                        </div>

                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="password" name="conpass" id="" class="form-control" autocomplete="off" placeholder="Enter confirmed Password">
                        </div>
                        <br>
                        <input type="submit" value="Apply Now" name="apply" class="btn btn-success">
                        <br>
                        <p>I already have an account <a href="doctorlogin.php">click to Login</a></p>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</body>

</html>