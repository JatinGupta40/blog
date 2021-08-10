<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "blogging";

$conn = mysqli_connect($servername, $username, $password , $db_name);

//checkconnection
if(!$conn){
    die('Error:cannot connect');
}
echo "Connected to $db_name db successfully.";
?>
