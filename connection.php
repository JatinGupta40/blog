<?php

    ob_start();
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "bloggin";

    $conn = mysqli_connect($servername, $username, $password , $db_name);

//checkconnection
    if(!$conn){
        dir('Error:cannot connect');
        }
        echo "Connected to $db_name db successfully.";
?>
