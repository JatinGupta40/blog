<?php

    session_start();
    session_unset();
    session_destroy();
    header('location:blogs.php');
    //session_unset($_SESSION['$emailid']);

?>
