<?php


// //if user is not logined in will direct him to login page
session_start();
if (!isset($_SESSION["user"])) {
    header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashbord</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="http://localhost:8080/login%20and%20rgistrastion%20form/style.css" type="text/css">
</head>

<body>
    <div class="container">
        <h1>Welcome to dashboard</h1>
        <a href="/logout.php" class="btn btn-warning">LOGOUT</a>
    </div>
</body>

</html>