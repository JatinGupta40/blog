<?php
namespace searchQuery;
use connectionDB\connection;
require_once($_SERVER['DOCUMENT_ROOT'] . "/classes/connection.php");


// Function for Methods.
class search extends connection
{
 
  // Search function OR content LIKE '%$search%' ORDER BY updated_at DESC";
  public function search($search)
  {
    // For cookie/language name english.
    if($_COOKIE['cookiename'] == "en")
    {
      $result = mysqli_query($this->connection,"SELECT * FROM blog WHERE Heading LIKE '%$search%' OR content LIKE '%$search%'");
      return $result;
    }
    // If cookie/language is not english, then input will be in english but output should be in hindi. 
    else
    {
      $result = mysqli_query($this->connection,"SELECT * FROM blog WHERE Heading LIKE '%$search%' OR content LIKE '%$search%'");
      return $result;
    }
  }
}
?>