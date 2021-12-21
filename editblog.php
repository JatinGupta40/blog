<?php 
  
  require_once ($_SERVER['DOCUMENT_ROOT'] .'/header.php');
  require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/blog.php');
  require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/carousel.php');
  require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/user.php');
  require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/method.php');

    $blog = new blogQuery\blog;
    $carousel = new carouselQuery\carousel;
    $user = new userQuery\user;
    $method = new methodQuery\method;

    // Fetching ID of user whose blog is needed to be edited.
    $a = $_GET['id'];
    $head = $_GET['Heading'];
        
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

      if (!empty($_POST['cleanurl'])) 
      {
        $cleanurl = htmlspecialchars($_POST['cleanurl']);
      }
      else
      {
        $cleanurl = null;
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
        $a = substr($a, strrpos($a, '/') + 1);
        $res = $blog->updateBlog($title, $content, $cleanurl, $a);
        if ($res === TRUE) 
        {
          $cookie = $_COOKIE['cookiename'];
          header('Location:$cookie/blogslogin');
        }
        else 
        {
          echo "Something Went Wrong";
        }
      }
    }
?>
<?php 
    $result = $blog->selectBlogEdit($a);
      if($result->num_rows > 0)
      {
        while ($row = $method->fetchAssoc($result))
        {
          $id = $row['id'];
          $title = $row['Heading'];
          $content = $row['content'];
          $cleanurl = $row['cleanurl'];
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
    <div class="form-group">
      <label>Custom Clean URL :</label>
      <input type="text" name="cleanurl" class="form-control blogcommentbox" value="<?php echo $cleanurl ?>" placeholder="Clean Url"> 
    </div>  
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<?php include 'footer.php' ?>