<?php

//connenction to the database
$hostName="localhost";
$dbUser="root";
$dbpassword="";
$dbName= "login-livestock";
$dbport="3307";

$conn=mysqli_connect($hostName,$dbUser,$dbpassword,$dbName,$dbport);

if(!$conn){
    die ("something went wrong");
}


?>