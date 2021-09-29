<?php
  class connection
  {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    public $db_name = "bloggin";
    protected $conn;
    protected $conn1;
    
    // Constructor 
    public function __construct()
    {
    try
      {
        //$this->conn = new PDO("mysql:host=" . $this->servername. ";dbname=" . $this->db_name, $this->username, $this->password);
        $this->conn1 = mysqli_connect("localhost", "root", "", "bloggin");
      }
    catch(PDOException $e)
      {
      echo "Connection Failed : ". $e->getMessage();
      }
    }
  }
?>
