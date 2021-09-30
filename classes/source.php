<?php
namespace sourceQuery;
//include './connection.php';

class source 
{
  public $connection;
  public $result;
  function __construct()
  {
    $this->connection = mysqli_connect("localhost", "root", "", "bloggin");
  }
  
  // Function for checking email in DB. Register
  public function checkEmail($email)
  {
    $result = mysqli_query($this->connection,"Select * from user where emailid = '$email'");
    return $result;
  } 

  // Function for inserting user details into DB.
  public function insertUserDetails($fname, $lname, $email, $pass)
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
  public function selectBlog($id, $offset, $no_of_records_per_page)
  { 
    $result = mysqli_query($this->connection,"SELECT id, Heading, content FROM blog where userid=$id ORDER BY id DESC LIMIT $offset, $no_of_records_per_page");
    return $result;
  }

  // Counting number of blog user have added.
  public function countBlog($id)
  {
    $result = mysqli_query($this->connection,"SELECT COUNT(*) FROM blog where userid=$id");
    return $result;
  }

  // Counting all the blogs presesnt in DB.
  public function countAllBlog()
  {
    $result = mysqli_query($this->connection,"SELECT COUNT(*) FROM blog");
    return $result;
  }
  public function insertBlog($id, $heading, $content)
  {
    $result = mysqli_query($this->connection,"Insert into `blog` (`userid`, `Heading`, `content`) VALUES ('$id','$heading','$content')");
    return $result;
  } 
  
  // Getting details from a DB table of a specified user. Also To View Article
  public function blogById($id)
  {
    $result = mysqli_query($this->connection,"SELECT * from blog where id='$id'");
    return $result;
  }

  // Deleting a blog.
  public function deleteBlog($id)
  {
    $result = mysqli_query($this->connection,"DELETE from blog where id='$id'");
    return $result;
  }

  // select a blog for editing.
  public function selectBlogEdit($id)
  {
    $result = mysqli_query($this->connection,"SELECT * FROM blog WHERE id='" . $id . "' LIMIT 1");
    return $result;
  }
  
  // Update a blog after editing.
  public function updateBlog($title, $content, $id)
  {
    $result = mysqli_query($this->connection,"UPDATE blog SET Heading='$title', content='$content' WHERE id=$id");
    return $result;
  }

  // Getting Blogs for Paging.
  public function fetchBlogPaging($offset, $no_of_records_per_page)
  {
    $result = mysqli_query($this->connection,"select * from blog ORDER BY id DESC LIMIT $offset, $no_of_records_per_page");
    return $result;
  }
   
  // Search function // OR content LIKE '%$search%' ORDER BY updated_at DESC";
  public function search($search)
  {
    $result = mysqli_query($this->connection,"SELECT * FROM blog WHERE Heading LIKE '%$search%'");
    return $result;
  }
  
  // Carousel.
  public function carousel()
  {
    $result = mysqli_query($this->connection,"SELECT * FROM carousel");
    return $result;
  }
  

  // Uploading Image for Carousel.
  public function uploadImage($id, $locationdb, $title, $author)
  {
    $result = mysqli_query($this->connection,"INSERT INTO `carousel`(`userid`, `image`, `title`, `imageby`) VALUES ($id, '$locationdb', '$title', '$author')");
    return $result;
  }

  // Getting details of the Image uploaded by specific user and checked for Carousel.
  public function selectImage($tick)
  {
    $result = mysqli_query($this->connection,"select * from `carousel` where image = '$tick'");
    return $result;
  }
  
  // Updating carousel checked value to true when the tick the image.
  public function updateImage($tick)
  {
    $result = mysqli_query($this->connection,"UPDATE carousel SET checked = TRUE  WHERE image = '$tick'");
    return $result;
  }

  // Deleting carousel checked image.
  public function deleteImage($tick)
  {
    $result = mysqli_query($this->connection,"DELETE FROM `carousel` WHERE image = '$tick'");
    return $result;
  }

  // Update Token, time for forgot password.
  public function updateToken($password, $code, $expDate, $email)
  {
    $result = mysqli_query($this->connection,"UPDATE user set password='" . $password . "', reset_link_token='" . $code . "' ,exp_date='" . $expDate . "' WHERE emailid='" . $email . "'");
    return $result;
  }

  // Get Token, time for forgot password.
  public function selectToken($code, $email)
  {   
    $result = mysqli_query($this->connection,"SELECT * FROM user WHERE reset_link_token='" . $code . "' and emailid='" . $email . "';");
    return $result;
  }

  // Update Password
  public function updatePassword($password, $email)
  {   
    $result = mysqli_query($this->connection,"UPDATE user set  password='" . $password . "', reset_link_token=NULL, exp_date=NULL WHERE emailid='" . $email . "'");
    return $result;
  }
}
  
?>