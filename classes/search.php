<?php

namespace searchQuery;
use connectionDB\connection;
require_once($_SERVER['DOCUMENT_ROOT'] . "/blogging/classes/connection.php");
// Function for Methods.
class search extends connection
{
 
  // Search function // OR content LIKE '%$search%' ORDER BY updated_at DESC";
  public function search($search)
  {
    $result = mysqli_query($this->connection,"SELECT * FROM blog WHERE Heading LIKE '%$search%'");
    return $result;
  }
}
?>