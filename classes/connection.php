<?php
namespace connectionDB;
use Mysqli;
class connection
  {
    // private $server;
    // private $dbuser;
    // private $dbpass;
    // private $db;
    // private $conn;

    public $connection;
    
    // Constructor 
    public function __construct()
    {
      try
      {
        $this->connection = mysqli_connect("localhost", "root", "Jatin@12", "bloggin");
        // if($this->connection == TRUE)
        // {
        //   return $this->connection;
        // }
        // else
        // {
        //   echo "Connection Failed";
        // }
      }
      catch(Exception $e)
      {
        echo "Connection failed : ", $e;
      }
    }
    // public function connect()
    // {
    //     $conn = new mysqli("localhost", "root", "Jatin@12", "bloggin");
    //     if(!$conn){
    //       echo $conn->connect_error();
    //     }
    //             return $conn;
    // }

  }
?>
