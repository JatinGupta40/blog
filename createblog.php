<?php
    include ("headerlogin.php");
?>

<div class="container d-flex align-items-center createblog">

<form action="validation/validationblog.php" method="POST" style="width:50%">
  <div class="form-group">
    <label for="exampleInputEmail1">Title/Heading</label>
    <input type="title" class="form-control" placeholder="Enter Title">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Content</label>
    <textarea type="content" rows="8" class="form-control" placeholder="Blog Content"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
