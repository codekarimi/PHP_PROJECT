<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="http://localhost:8080/login%20and%20rgistrastion%20form/style.css" type="text/css">
</head>

<body>
    <div class="container">
        <?php
        // print_r($_POST);
        if (isset($_POST["submit"])) {
           $fullname=$_POST["fullname"];
           $email
            = $_POST["email"];
           $password
            = $_POST["password"];
           $rpassword
            = $_POST["rpassword"];


            //password encryption
            $passwordHash=password_hash($password,PASSWORD_DEFAULT);

            //if errors variable is empty is good now(for validation)
            $errors =array();


            #if input are empty
            if ( empty($fullname) OR  empty($email) OR  empty($password) OR  empty($rpassword)) {
                array_push($errors,"All field are required");
            }

            //checking email
           if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "email is not valid");
           } 

           //checking on the password
          if (strlen($password)<8) {
                array_push($errors, "password must be at least 8 character long");
          } 

          //password verification
          if ($password !== $rpassword) {
            array_push($errors, "Password dont match");
          }

            //prevent duplicating mail
            require_once "database.php";
          $sql= "SELECT * FROM users WHERE Email= '$email'";
          $result= mysqli_query($conn,$sql);
          $rowcount=mysqli_num_rows($result);
          if ($rowcount) {
            array_push($errors,"Email alreday exist");
          }


          
            if (count($errors) > 0) {
                foreach ($errors as $error)
                    echo "<div class='alert alert-danger'>$error</div>";
            } else {
                //insert data to database

               

                $sql= "INSERT INTO users (Fullname,Email,Password)VALUES (?,?,?)";
                $stmt=mysqli_stmt_init($conn);
                $preparestmt = mysqli_stmt_prepare($stmt,$sql);
                if ($preparestmt) {
                    mysqli_stmt_bind_param($stmt,"sss",$fullname,$email,$passwordHash);
                    mysqli_stmt_execute($stmt);
                    echo "<div class='alert alert-success'>You registered successfully<div>";
                }else{
                    die ("something went wrong");
                }

            }
        }

       
        ?>
        <form action="registration.php" method="post">

            <div class="form-group">
                <input type="text" name="fullname" id="" placeholder="Fullname" class="form-control">
            </div>
            <div class="form-group">
                <input type="email" name="email" id="" placeholder="Enter email" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="password" id="" placeholder="password" class="form-control">
            </div>
            <div class="form-group">
                <input type="text" name="rpassword" id="" placeholder="Repeat Password" class="form-control">
            </div>
            <div class="form-btn">
                <input type="submit" value="Register" name="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
</body>

</html>