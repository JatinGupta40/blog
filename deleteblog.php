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
  // Getting id of blog.
  $id = $_GET['id']; 
  //$id = substr($id, strrpos($id, '/') + 1);
?>

<?php 

  if($_POST['submit'] == 'yes')
  {
    $sql = $blog->deleteBlog($id);
    header("Location:/".$_COOKIE['cookiename']."/blogslogin");
  }
  elseif($_POST['submit'] == "no")
  {
    header("Location:/".$_COOKIE['cookiename']."/blogslogin");  
  }
?>

  <!-- Form for deleting a blog; -->
  <div class="container deleteblog">
    <form action ="" method = "POST">
      <h3> Are you sure you want to delete this blog ? </h3>
      <div class="editdeletebutton">
        <button type="submit"  class="" value = "yes" name="submit"> Yes </button></a>
        <button type="submit"  class="" value = "no" name="submit"> No </button></a>
      </div>
    </form>
  </div>
  
  <!-- Blogs content start. -->
  <div class="blogbox"></div>
   
  <!-- Blogs content END -->
   
<main id="main"></main>

<div style="margin-top:50px;"></div>

<?php include './footer.php'?>