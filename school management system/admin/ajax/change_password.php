<?php

session_start();

$admin =$_SESSION['admin'];

include('../include/connection.php');

$old =$_POST['old'];
$new =$_POST['new'];
$confirm =$_POST['confirm'];


$error =array();

$check_pass ="SELECT password FROM admin WHERE username='$admin'";
$res=mysqli_query($connect,$check_pass);
$row=mysqli_fetch_array($res);
$old_pass_hash= $row['password'];

$new_hash=password_hash($new, PASSWORD_DEFAULT);

$output ="";


if (empty($old)) {
    # code...
    $error['e'] ="Enter Old Password";
}else if (empty($new)) {
    # code...
    $error['e'] = "Enter New Password";
} else if (empty($confirm)) {
    # code...
    $error['e'] = "Enter confirm Password";
} else if (!password_verify($old,$old_pass_hash)){
    $error['e'] = "incorect Password !!!!";
} else if ($new != $confirm ){
    $error['e'] = "Both New Password && Old Password does match!!!!";
} else if ($new == $old){
    $error['e'] = "Password still the same!!!!";
}


if (count($error) == 0) {
    # code...
    $query =mysqli_query($connect,"UPDATE admin SET password='$new_hash' WHERE username='$admin' ");

    if ($query){
        $output .= "<p class='alert alert-success text-center'> Password Changed </p>";

    }else{
        $output .= "<p class='alert alert-danger text-center'> Passwoed Failed To change </p>";
    }
}


if (isset($error['e'])) {
    # code...
    $output .= "<p class='alert alert-danger text-center'>".$error['e']."</p>";
}else {
    # code...
    $output .="";
}

echo $output;

?>