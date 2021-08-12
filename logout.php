<?php

    session_start();
    session_unset();
    header('location:blogs.php');
    //session_unset($_SESSION['$emailid']);

?>
