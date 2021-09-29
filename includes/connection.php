<?php
error_reporting(0);
$db_host="localhost";
$db_user="root";
$db_password="";
$db_name="blogging";
$connection = mysql_connect("$db_host","$db_user","$db_password");
if(!connection)
{
 die('Connection failed:'.mysql_error());
 echo("not connected");
}
mysql_select_db($db_name,$connection) or die(mysql_error());
?>
