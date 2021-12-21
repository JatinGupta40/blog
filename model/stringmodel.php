<?php
namespace stringQuery;
use connectionDB\connection;
require_once($_SERVER['DOCUMENT_ROOT'] . "/classes/connection.php");

class stringmodel extends connection
{  

  public function stringTranslate($string)
  {
    if($_COOKIE['cookiename'] == 'en')
    {
      $ck = $_COOKIE['cookiename'];
      $result = mysqli_query($this->connection,"SELECT * FROM string where term = '$string'");
      $a = mysqli_fetch_array($result);
      echo $a[1];
    }
    else 
    {
      $ck = $_COOKIE['cookiename'];
      $result = mysqli_query($this->connection,"SELECT * FROM string where language = '$ck' AND term = '$string'");
      if($result->num_rows > 0)
      {
        $a = mysqli_fetch_array($result);
        echo $a[2];
      }
      else
      {
        echo $string;  
      }
 
    }
  } 
}

?>