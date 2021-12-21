<?php
namespace connectionDB;
use Mysqli;
class connection
  {
    public $connection;
    
    public function __construct()
    {
      try
      {
        $this->connection = mysqli_connect("localhost", "root", "Jatin@12", "bloggin");
        if($this->connection == TRUE)
        {
          return $this->connection;
        }
        else
        {
          echo "Connection Failed";
        }
      }
      catch(Exception $e)
      {
        echo "Connection failed : ", $e;
      }
    }

  }
?>
