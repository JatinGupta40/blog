<?php
    include ("header.php");
    include 'connection.php';
    $a = $_SESSION['fname'];
    $id = $_SESSION['id'];
    echo $id;
    echo $a;
    
    if(isset($_POST['submit']))
    {
      $heading = $_POST['heading'];
      $content = $_POST['content']; 
      //echo $heading;
      //echo $content;
      // if(!empty($heading))
      // {
      //   $heading = htmlspecialchars($heading);
      // }
      // else
      // {
      //   $heading = null;
      // }
//            INSERT INTO `user` (`fname`, `lname`, `emailid`, `password`) VALUES ('$fname','$lname','$email','$pass')";
      $sql = "Insert into `blog` (`userid`, `Heading`, `content`) VALUES ('$id','$heading','$content')";
      $result = mysqli_query($conn,$sql); //mapping to the db
      header("location:blogslogin.php");
      //$row = mysqli_num_rows($res); 
      // if($result)
      // {
      //   //echo $result;
      // }
    }

?>


<div class="container d-flex align-items-center createblog">

<form method="POST" style="width:50%">
  <div class="form-group">
    <label>Title/Heading</label>
    <input type="title" name="heading" class="form-control" placeholder="Enter Title">
  </div>
  <div class="form-group">
    <label for="">Content</label>
    <textarea type="content" name="content" rows="8" class="form-control" placeholder="Blog Content"></textarea>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
</div>
