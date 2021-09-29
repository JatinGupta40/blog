<?php 
    include "header.php";
    include 'init.php';

    // Fetching ID of user whose blog is needed to be edited.
    $a = $_GET['id'];
    if (empty($_SESSION['id']))
    {
      header('index.php');
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') 
    {
      // Validation.  
      if (!empty($_POST['title']))
      {
        $title = htmlspecialchars($_POST['title']);
      }
      else
      {
        $title = null;
      }

      if (!empty($_POST['content'])) 
      {
        $content = htmlspecialchars($_POST['content']);
      }
      else
      {
        $content = null;
      }
        
      $errors = array();

      if ($title == null) 
      {
        $errors['title'] = 'Title is Required.';
      }

      if ($content == null) 
      {
        $errors['content'] = 'Content is Required.';
      }

      if (count($errors) > 0) 
      {
        foreach ($errors as $key => $value) 
        {
          echo '<div class="aler alert-danger">' . $value . '</div>';
        }
      }
      else
      {
        $sql = "UPDATE blog SET Heading='$title', content='$content' WHERE id=$a";
        if ($conn->query($sql) === TRUE) 
        {
          header('Location:blogslogin.php');
        }
        else 
        {
          $error = $conn->error;
          echo "Something Went Wrong";
        }
      }
    }
?>
<?php 
    $result = $source->selectblogedit($a);
      if($result->num_rows > 0)
      {
        while ($row = $method->fetchassoc($result))
        {
          $id = $row['id'];
          $title = $row['Heading'];
          $content = $row['content'];
        }
      }
?>


<div class="container d-flex align-items-center createblog">
  <form action="" method="POST" style="width:55%">
  <h3 class="form-caption">Edit Article</h3>
  <hr>
    <div class="form-group">
      <label>Title/Heading</label>
      <input type="title" name ="title" class="form-control" value="<?php echo $title; ?>" placeholder="Enter Title">
    </div>
    <div class="form-group">
      <label>Content</label>
      <textarea type="content" name="content" rows="10" class="form-control" placeholder="Blog Content"><?php echo $content; ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<?php include 'footer.php' ?>