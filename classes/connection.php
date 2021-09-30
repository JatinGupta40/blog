<?php
  class connection
  {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    public $db_name = "bloggin";
    protected $conn;
    protected $conn1;
      public $connection; 
    // Constructor 
    public function __construct()
    {
      try
      {
        echo "connected";
        $this->connection = mysqli_connect("localhost", "root", "", "bloggin");
      }
      catch(mysqli_sql_exception $e)
      {
        echo "failed",$e;
      }
    }
    // try
    //   {
    //     //$this->conn = new PDO("mysql:host=" . $this->servername. ";dbname=" . $this->db_name, $this->username, $this->password);
    //     $this->conn1 = mysqli_connect("localhost", "root", "", "bloggin");
    //   }
    // catch(PDOException $e)
    //   {
    //   echo "Connection Failed : ". $e->getMessage();
    //   }
    // }
  }
?>
