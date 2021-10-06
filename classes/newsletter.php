<?php
namespace newsletterQuery;
use connectionDB\connection;
include './connection.php';
class newsletter extends connection
{
  public $result;
  
  // Checking email-id is already registered or not..
  public function subscribe($email)
  {
    $result = mysqli_query($this->connection,"SELECT * from newsletter where emailid = '$email'");
    return $result;
  } 
  
  // Inserting email-id is not already registered.
  public function insert($email)
  {
    $result = mysqli_query($this->connection,"INSERT INTO `newsletter` (`emailid`, `subscribe`) VALUES ('$email', TRUE)");
    return $result;
  }
  
}
  

?>