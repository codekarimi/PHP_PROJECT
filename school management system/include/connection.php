<?php

$dbhost='localhost';
$dbuser='root';
$dbpass='';
$db='sms';
$dbport='3307';


$connect =mysqli_connect($dbhost,$dbuser,$dbpass,$db,$dbport);


if (!$connect) {
    # code...

    echo "Something went wrong";
}





?>