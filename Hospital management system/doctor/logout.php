<?php

session_start();

#logging out
if (isset($_SESSION['doctor'])) {
    unset($_SESSION['doctor']);

    header("Location:../index.php");
}
