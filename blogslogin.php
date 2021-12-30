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


    // Successfully registered message for new registered user only.
    if ($_SESSION['success'] == 1) 
    {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Successfully Registered!</strong></div>';
    }
    else
    {
      // Nothing to show.
    }
?>
    <div class="addblog">
      <h2><a href="<?php echo $_COOKIE['cookiename']?>/createblog">Add Blog</a></h2>
      <h2><a href="<?php echo $_COOKIE['cookiename']?>/personalisedcarousel">Personalise Carousel</a></h2>
    </div>
    <hr>
    <div dir="<?php echo $rtl;?>" class="container">
      <h2><u>My Blogs</u> <i class="fas fa-caret-down"></i></h2>
    </div>
    <?php
    // To Check who logged in, either the user or admin 
    if($_SESSION['email'] == "admin@gmail.com")
    {
      // Fetching from the user table.
      $adminquery = $blog->blog();
      if($adminquery->num_rows > 0)
      {
        // Here, fetch function is called from source file and method class.
        while($row = $method->fetchArray($adminquery))
        {
          // Fetching details from DB
          $id = $row['id'];
          $heading = $row['Heading'];
          $content = $row['content'];
          $cleanurl = $row['cleanurl']
      ?>
          <!-- Displaying all the blogs that logged-in user added. -->
          <div dir="<?php echo $rtl;?>"class="container blogbox">
            <h3><?php echo $heading; ?></h3>
            <p>
      <?php
            // Trimming down the content to 150 words only.
            $content = substr($content, 0, 150); 
            echo $content;
      ?>
            </p>
            <p>
              <div class="editdelete">
                <div class="editdeletebutton">
                  <a href="<?php echo $_COOKIE['cookiename']; ?>/article/<?php echo $id;?>/<?php echo $heading; ?>"><button type="submit" class="" name="submit"> View </button></a>
                </div>    
                <div class="editdeletebutton">
                  <a href="<?php echo $_COOKIE['cookiename']; ?>/editblog/<?php echo $id;?>">
                  <button type="submit"  class="" name="submit"> Edit </button></a>
                </div>
                <div class="editdeletebutton">
                  <a href="<?php echo $_COOKIE['cookiename']; ?>/deleteblog/<?php echo $id;?>/<?php echo $heading; ?>"><button type="submit" class="" name="submit"> Delete </button></a>
                </div>
              </div>  
            </p>
          </div>
      <?php
        }
      }
      else
      {
?>
        <div class="">
          <h5>You have not added any Blog yet.</h5>
          <p>(To create click on the Add Blog button above.)</p>
        </div>
<?php        
      }
    }   
    // If the logged-in user is not admin.
    else
    {
      $email = $_SESSION['email'];
      // For accessing the id of the logged in user to be used as reference for getting Heading and content data to be fetched from the blog table.

      // Checking the logged in user is registered user and not is not an  admin.
      $userquery = $user->checkEmail($email);
      if ($userquery->num_rows > 0)      
      {
        while ($row1 = $method->fetchArray($userquery))
        {   
          // Id fetching from DB table of user.
          $id = $row1['id']; 
          $_SESSION['fname'] = $row1['fname'];
          $_SESSION['id'] = $row1['id'];
        }
      }
        
      if (isset($_GET['pageno'])) 
      {
        $pageno = $_GET['pageno'];
      } 
      else 
      { 
        $pageno = 1;
      }

      // Number of blogs to be shown on a single page.
      $no_of_records_per_page = 5;  
      $offset = ($pageno-1) * $no_of_records_per_page;
        
        
      // Counting the number of blogs user have of his own.
      $result = $blog->countBlog($id); // Mapping it to db.
      $total_rows = $method->fetchArray($result)[0];

      // Total number of pages to be made with respect to 5 blogs per page.
      $total_pages = ceil($total_rows / $no_of_records_per_page);  // The ceil function round off the value.
            
      // Fetching data from DB table blog.
      $result = $blog->selectBlog($id, $offset, $no_of_records_per_page);
      if ($result->num_rows > 0)      
      {
        while ($row = $method->fetchArray($result))
        {
          $id = $row['id'];
          $heading = $row['Heading'];
          $content = $row['content'];
          $cleanurl = $row['cleanurl'];
?>
          <div class="" style="margin-top:20px;">
            <div class="container blogbox">
              <h3><?php echo $heading; ?></h3>
                <p>
                  <?php
                  {
                    echo $content;
                  }
                  ?>
                  <!-- If cleanurl is provided then cleanurl is shown in the url else the heading will be shown. -->
                  <?php 
                  if($cleanurl=="")
                  {
                    $heading;
                  }
                  else
                  {
                    $heading = $cleanurl;
                  }
                  
                  ?>
                  <div class="editdelete">
                    <div class="editdeletebutton">
                      <a href="<?php echo $_COOKIE['cookiename']; ?>/createblog/<?php echo $id; ?>"><button type="submit" class="" name="submit"> Translate </button></a>
                    </div>  
                    <div class="editdeletebutton">
                      <a href="<?php echo $_COOKIE['cookiename']; ?>/article/<?php echo $id; ?>/<?php echo $heading; ?>"><button type="submit" class="" name="submit"> View </button></a>
                    </div>    
                    <div class="editdeletebutton">
                      <a href="<?php echo $_COOKIE['cookiename']; ?>/editblog/<?php echo $id ?>">                    
                      <button type="submit" class="" name="submit"> Edit </button></a>
                    </div>
                    <div class="editdeletebutton">
                      <a href="<?php echo $_COOKIE['cookiename']; ?>/deleteblog/<?php echo $id;?>/<?php echo $heading; ?>"><button type="submit" class="" name="submit"> Delete </button></a>
                    </div>
                  </div>
                </p>
            </div>
          </div>
<?php
        }
      }
      else
      {
?>
        <div class="">
          <h5>You have not added any Blog yet.</h5>
          <p>(To create click on the '<u>Add Blog</u>' button above.)</p>
        </div>
<?php
      }
    }
?>

    <div class="paging">
      <ul>
        <li>
          <a href="?pageno=1">First</a>
        </li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li>
          <a href="?pageno=<?php echo $total_pages; ?>">Last</a>
        </li>
      </ul>
    </div>

<?php include 'footer.php'; ?>