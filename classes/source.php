<?php

class source extends connection
{
  public $Query;
  // Query method accept all database queries
  public function sqlquery($query, $param = [])
  {
    if(empty($param))
    {
      // If we dont have the parameters.
      $this->sqlquery = $this->conn->prepare($query);
      return $this->sqlquery->execute();
    } 
    else 
    {
      // If we have some parameters in our query.
      $this->sqlquery = $this->conn->prepare($query);
      return $this->sqlquery->execute($param);
    }
  }
    // Counting rows in a table.
    public function CountRows()
    {
      return $this->sqlquery->rowCount();
    }

    // Counting total number of blogs present in a DB. 
    public function CountRowsBlog()
    {
      $nRows = $this->conn->query('select count(*) from blog')->fetchColumn();   
      return $nRows;
    }

    // Fetch all records from specific table.
    public function FetchAll()
    {
      return $this->sqlquery->fetchAll(PDO::FETCH_OBJ);
    }
    
    // Fetch single row from specific table.
    public function Single()
    {
      return $this->sqlquery->fetch(PDO::FETCH_OBJ);
    }
    
    public function FetchALL2($query, $param = [])
    {
      $temp = $this->conn->prepare($query);
      return $temp->execute();
    }
   
}
?>