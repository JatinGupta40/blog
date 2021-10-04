<?php
namespace connectionDB;
  class connection
  {
    public $connection;
    
    // Constructor 
    public function __construct()
    {
      try
      {
        $this->connection = mysqli_connect("localhost", "root", "", "bloggin");
      }
      catch(Exception $e)
      {
        echo "Connection failed : ", $e;
      }
    }
  }
?>
