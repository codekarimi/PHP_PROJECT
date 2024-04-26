<?php

include("connect.php");
if (isset($_POST["create"])) {

    $title=mysqli_real_escape_string($conn,$_POST["title"]) ; //remove special charcter especially in times of hacking
    $author=mysqli_real_escape_string($conn,$_POST["author"]);
    $type=mysqli_real_escape_string($conn,$_POST["type"]);
    $description=mysqli_real_escape_string($conn,$_POST["description"]);

    //to insert into mysql databbases
    $sql="INSERT INTO books(Title,Author,Type,Description)VALUES('$title','$author','$type','$description')";

    //checking if what is inserrted is okay
   if(mysqli_query($conn,$sql)){
    echo "record added ";
   }else{
    die ("something went wrong");
   }

}



?>