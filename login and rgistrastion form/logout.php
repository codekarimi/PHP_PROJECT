<?php
session_start();
session_destroy(); //so no value anymore
header("location:login.php");//directed to login again


?>