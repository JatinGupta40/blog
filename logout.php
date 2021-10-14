<?php

    session_start();
    session_unset();
    session_destroy();
    header('location:index.php');
    //session_unset($_SESSION['$emailid']);

?>
