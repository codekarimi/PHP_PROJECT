<?php


$dbhost = "localhost";
$dbpass = "";
$dbuser = "root";
$db = "HMS";
$dbport = "3307";

$connect =mysqli_connect($dbhost,$dbuser,$dbpass,$db,$dbport);

if(!$connect)  #if connnection fails
{ 
die("Connection failed: " . mysqli_connect_error()); 
} 


?>