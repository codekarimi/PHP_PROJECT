<?php

include('../include/connection.php');


$username =$_POST['uname'];
$password =$_POST['pass'];
$confirmpassword =$_POST['con_pass'];

$output ="";

$pass_hash=password_hash($password , PASSWORD_DEFAULT);

$checkuser =mysqli_query($connect,"SELECT username FROM admin WHERE username='$username'");

$error = array();

if (empty($username)) {
    # code...
    $error['admin']="Enter Username";
}else if(empty($password)){
    $error['admin'] = "Enter Password";
} else if (empty($confirmpassword)) {
    $error['admin'] = "Enter  Confirm Password";
}else if (!password_verify($confirmpassword,$pass_hash)) {
    #enter Data
    $error['admin'] = "Both Password does not match";
} else if (mysqli_num_rows($checkuser) > 0) { #avoiding duplication
    #enter Data
    $error['admin'] = "Username Already Exist";
}


if (count($error) == 0) {
    # code...
    $query = "INSERT INTO admin(username,password,profile) VALUES('$username','$pass_hash','')";

    $res=mysqli_query($connect,$query);

    if ($res) {
        # code...
        $output .= "<p class='alert alert-success text-center'> New Admin Member Added </p>";

        


    }else{
        $output .= "<p class='alert alert-danger text-center'>Failed To Add Member</p>";
    }
}

if (isset($error['admin'])) {
    # code...

    $output .= "<p class='alert alert-danger text-center'>" . $error['admin'] . "</p>";
}else{
    $output .= "";
}


echo $output;


?>