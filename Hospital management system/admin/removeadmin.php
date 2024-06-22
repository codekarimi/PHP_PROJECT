<?php

include('../connection.php');

$id = $_POST['id']; 

$query = "DELETE * FROM amin WHERE ID='$id'";
mysqli_query($connect, $query);

?>