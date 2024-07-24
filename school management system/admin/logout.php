<?php
session_start();
if (isset($_SESSION['admin'])) {
    # code...

    unset($_SESSION['admin']);

    header("Location:../adminlogin.php");
}



?>