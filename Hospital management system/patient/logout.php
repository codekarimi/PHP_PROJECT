<?php

session_start();

#logging out
if (isset($_SESSION['patient'])) {
    unset($_SESSION['patient']);

    header("Location:../index.php");
}
