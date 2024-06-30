<?php


$dbhost = "localhost";
$dbpass = "";
$dbuser = "root";
$db = "";
$dbport = "3307";

$connect =mysqli_connect($dbhost,$dbuser,$dbpass,$db,$dbport);

if(!$connect)  #if connnection fails
{ 
die("Connection failed: " . mysqli_connect_error()); 
} 


?>