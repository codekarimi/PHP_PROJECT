<?php

error_reporting(0);  #display no errors
session_start();
include('../include/connection.php');

$username =$_POST['username'];
$password =$_POST['password'];



$error =array();

$check_pass=mysqli_query($connect,"SELECT password FROM admin WHERE username='$username'");
$row =mysqli_fetch_array($check_pass);

$pass_hash=$row['password'];

$output = "";

if (empty($username)) {
    # code...
    $error['admin']="Enter Username";
}else if (empty($username)) {
    # code...
    $error['admin'] = "Enter Password";
}else if (password_verify($password, $pass_hash)) {
        # code...
        echo '<script>window.location.href="http://localhost:8080/school%20management%20system/admin/"</script>';
        $_SESSION['admin'] =$username;

        $output .="<p class='alert alert-success text-center'>You Have succesfully Logined In </p>";
}else{
    $output .= "<p class='alert alert-success text-center'>Failed to Login </p>";
    }

if (isset($error)) {
    # code...
    $output .= "<p class='alert alert-success text-center'>" . $error['admin'] . "</p>";
} else {
    $output .= "";
}

echo $output;

?>