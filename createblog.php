<?php
    include ("header.php");
    include 'connection.php';
    $a = $_SESSION['fname'];
    $id = $_SESSION['id'];
    //echo $id;
    //echo $a;
    
    if(isset($_POST['submit']))
    {
      $heading = $_POST['heading'];
      $content = $_POST['content']; 
      $sql = "Insert into `blog` (`userid`, `Heading`, `content`) VALUES ('$id','$heading','$content')";
      $result = mysqli_query($conn,$sql); //mapping to the db
      header("location:blogslogin.php");
    }

?>


<div class="">

<form method="POST" style="width:50%">
  <div class="form-group">
    <label>Title/Heading</label>
    <input type="title" name="heading" class="" placeholder="Enter Title">
  </div>
  <div class="form-group">
    <label for="">Content</label>
    <textarea type="content" name="content" rows="8" class="" placeholder="Blog Content"></textarea>
  </div>
  <button type="submit" name="submit" class="">Submit</button>
</form>
</div>

<?php include 'footer.php' ?>