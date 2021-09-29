<?php
include './connection.php';
class source 
{
  public $connection;
  public $result;
  function __construct()
  {
    $this->connection = mysqli_connect("localhost", "root", "", "bloggin");
  }
  
  // Function for checking email in DB. Register
  public function checkemail($email)
  {
    $result = mysqli_query($this->connection,"Select * from user where emailid = '$email'");
    return $result;
  } 

  // Function for inserting user details into DB.
  public function insertuserdetails($fname, $lname, $email, $pass)
  {
    $result = mysqli_query($this->connection,"INSERT INTO `user` (`fname`, `lname`, `emailid`, `password`) VALUES ('$fname','$lname','$email','$pass')");
    return $result;
  } 

  // Fetching all the data of blog table.
  public function blog()
  {
    $result = mysqli_query($this->connection,"SELECT * from blog ORDER BY id DESC");
    return $result;
  } 
  
  // Fetching details of user added blog from blog table by provided user id.
  public function selectblog($id,$offset)
  {
    $result = mysqli_query($this->connection,"SELECT id, Heading, content FROM blog where userid=$id ORDER BY id DESC LIMIT $offset");
    return $result;
  }

  // Counting number of blog user have added.
  public function countblog($id)
  {
    $result = mysqli_query($this->connection,"SELECT COUNT(*) FROM blog where userid=$id");
    return $result;
  }

  // Counting all the blogs presesnt in DB.
  public function countallblog()
  {
    $result = mysqli_query($this->connection,"SELECT COUNT(*) FROM blog");
    return $result;
  }
  public function insertblog($id, $heading, $content)
  {
    $result = mysqli_query($this->connection,"Insert into `blog` (`userid`, `Heading`, `content`) VALUES ('$id','$heading','$content')");
    return $result;
  } 
  
  // Getting details from a DB table of a specified user.
  public function blogbyid($id)
  {
    $result = mysqli_query($this->connection,"SELECT * from blog where id='$id'");
    return $result;
  }

  // Deleting a blog.
  public function delete($id)
  {
    $result = mysqli_query($this->connection,"DELETE from blog where id='$id'");
    return $result;
  }

  // search a blog for editing.
  public function selectblogedit($id)
  {
    $result = mysqli_query($this->connection,"SELECT * FROM blog WHERE id='" . $id . "' LIMIT 1");
    return $result;
  }
  
  // Update a blog after editing.
  public function updateblog($id)
  {
    $result = mysqli_query($this->connection,"UPDATE blog SET Heading='$title', content='$content' WHERE id=$id");
    return $result;
  }

  //fetchblogpaging
  public function fetchblogpaging($offset, $no_of_records_per_page)
  {
    $result = mysqli_query($this->connection,"select * from blog ORDER BY id DESC LIMIT $offset, $no_of_records_per_page");
    return $result;
  }
}
  
// Function for Methods.
class method extends source 
{
  // Funcion for fetching array.
  public function numrows($query)
  {
    $result =  mysqli_num_rows($query);
    return $result;
 } 

  
  // Funcion for fetching array.
  public function fetch($query)
  {
    $result =  mysqli_fetch_array($query);
    return $result;
  } 
  
  // Funcion for fetching assoc.
  public function fetchassoc($query)
  {
    $result =  mysqli_fetch_assoc($query);
    return $result;
  } 
}

?>