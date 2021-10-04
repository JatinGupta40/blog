<?php
namespace userQuery;
use connectionDB\connection;
require_once($_SERVER['DOCUMENT_ROOT'] . "/blogging/classes/connection.php");

class user extends connection
{
  // Function for checking email in DB. Register
  public function checkEmail($email)
  {
    $result = mysqli_query($this->connection,"Select * from user where emailid = '$email'");
    return $result;
  } 

  // Function for inserting user details into DB.
  public function insertUserDetails($fname, $lname, $email, $pass)
  {
    $result = mysqli_query($this->connection,"INSERT INTO `user` (`fname`, `lname`, `emailid`, `password`) VALUES ('$fname','$lname','$email','$pass')");
    return $result;
  } 

  // Update Token, time for forgot password.
  public function updateToken($password, $code, $expDate, $email)
  {
    $result = mysqli_query($this->connection,"UPDATE user set password='" . $password . "', reset_link_token='" . $code . "' ,exp_date='" . $expDate . "' WHERE emailid='" . $email . "'");
    return $result;
  }

  // Get Token, time for forgot password.
  public function selectToken($code, $email)
  {   
    $result = mysqli_query($this->connection,"SELECT * FROM user WHERE reset_link_token='" . $code . "' and emailid='" . $email . "';");
    return $result;
  }

  // Update Password
  public function updatePassword($password, $email)
  {   
    $result = mysqli_query($this->connection,"UPDATE user set  password='" . $password . "', reset_link_token=NULL, exp_date=NULL WHERE emailid='" . $email . "'");
    return $result;
  }

}

?>