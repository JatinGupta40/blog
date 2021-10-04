<?php
    include ("header.php");
    include_once 'classes/blog.php';
    $blog = new blogQuery\blog;
    $a = $_SESSION['fname'];
    $id = $_SESSION['id'];
    
    if(isset($_POST['submit']))
    {
      $heading = $_POST['heading'];
      $content = $_POST['content']; 
      $result = $blog->insertBlog($id, $heading, $content);
      header("location:blogslogin.php");
    }

?>

<div class="container d-flex align-items-center createblog">
  <form method="POST" style="width:50%">
  <h3 class="form-caption">Edit Article</h3>
  <hr>
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

<?php include 'footer.php' ?>