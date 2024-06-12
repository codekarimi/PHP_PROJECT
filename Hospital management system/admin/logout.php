<?php

session_start();

#logging out
if (isset($_SESSION['admin'])) {
    unset($_SESSION['admin']);

    header("Location:../index.php");
}


?>