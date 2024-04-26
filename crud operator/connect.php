
<?php
//connection to database
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "crud";
$dbPort = "3307";

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName, $dbPort);

if (!$conn) {
    die("something went wrong");
}
?>