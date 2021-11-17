<?php

    ob_start();
    $servername = "localhost";
    $username = "root";
    $password = "Jatin@12";
    $db_name = "bloggin";

    $conn = mysqli_connect($servername, $username, $password , $db_name);

  // checkconnection
    if(!$conn)
    {
      dir('Error:cannot connect');
    }
       
?>
