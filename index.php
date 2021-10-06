<?php include './header.php';
<<<<<<< Updated upstream
      include 'classes/method.php';
      
      // Creating Object.
      $method = new method;
      $source = new sourceQuery\source;
  
      // Fetching carousel details from DB.
      $result1 = $source->carousel("SELECT * FROM carousel");
=======

include_once 'classes/blog.php';
include_once 'classes/carousel.php';
include_once 'classes/user.php';
include_once 'classes/method.php';
include_once 'classes/newsletter.php';
$blog = new blogQuery\blog;
$carousel = new carouselQuery\carousel;
$user = new userQuery\user;
$method = new methodQuery\method;
$newsletter = new newsletterQuery\newsletter;

// Carousel.
$result1 = $carousel->carousel("SELECT * FROM carousel");

>>>>>>> Stashed changes
?>

<!-- Carousel Start -->

      <div id="" class="carousel demo slide" data-ride="carousel">
        <!-- Indicators -->
        <ul class="carousel-indicators">
          <li data-target=".demo" data-slide-to="0" class="active"></li>
          <li data-target=".demo" data-slide-to="1"></li>
          <li data-target=".demo" data-slide-to="2"></li>
        </ul> 

        <!-- The slideshow -->
        <div class="carousel-inner">
        <?php
          $i = 0;
          foreach ($result1 as $row) 
          {
            $actives = '';
            if ($i == 0) 
            {
              $actives = 'active';
            }
              $img = $row['image'];
              $title = $row['title'];
              $imageby = $row['imageby'];
        ?>
            <div class="carousel-item <?= $actives; ?>">
              <img src="<?= $img; ?>">
              <h1><?= $title; ?></h1>
              <h3><?= $imageby; ?></h3>
            </div>
            <?php 
              $i++;
          } 
            ?>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href=".demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href=".demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>
<!-- Carousel ends. -->

<!-- Newsletter Start. -->

<<<<<<< Updated upstream
      <div class = "container newsletter">
        <h3>*TO get updates when we add new post for you. Dont forgot to subscribe us.*</h3>
        <div>  
          <?php
=======
<!-- Newsletter start -->
<?php

// NEWSLETTER Logic.
// User logged in or not.
if(isset($_SESSION['loggedin']))
  {
    if(isset($_POST['subscribe']))
    {
      
      
    }
  }
  else
  {
    // Validation and inserting into subscription table of DB.
    if(isset($_POST['subscribe']))
    {
      if(!empty($_POST['newsletteremail']))
      {
        $newsletteremail = $_POST['newsletteremail'];
        // Checking if entered emailid is already present in our system or not. 
        $newsletterquery = $newsletter->subscribe($newsletteremail);
        //print_r($newsletterquery);
        if($method->numRows($newsletterquery))
        {
          echo '<div class="alert-danger"> This email id is already subscribed for Newsletter. Please try with some different Newsletter.</div>';
        }
        else
        {
          $newsletter->insert($newsletteremail);
          echo '<div class="alert alert-success"><b>Thank You for Subscribing.</b></div>';
        }
      }
      else
      {
       $newsletteremail = null; 
      }
      $errors = array();
      if($newsletteremail == null) 
      {
        $errors['newsletteremail'] = '* Email-Id is required. *';
      }
      
    }    
  }
  
?>
    <div class="container newsletter">
      <h2>* To get updates of our newly updated or added blogs, Please Subscribe. * </h2>
      <form action="" method="POST">
        <?php 
          // If user is logged in then, no need to show the input box.
          if(isset($_SESSION['loggedin']))
          {
            $email = $_SESSION['email'];
            $newsletterquery = $newsletter->subscribe($email);
            // Check if the user has details in subscribe table or not.
            if($method->numRows($newsletterquery) < 1)
            {
        ?>
              <button type = "submit" name="usersubscribe">Subscribe</button>  
        <?php
            }
            else
            {
              // If user is logged-in and has details in subscribe table then check if user has already subscribed or not.
              $row = $method->fetchAssoc($newsletterquery);
              if($row['subscribe'] == 1)
              {
        ?> 
                <button type = "submit" name="userunsubscribe">Un-Subscribe</button>
        <?php
              }
              else
              {
        ?>
                <button type = "submit" name="usersubscribe">Subscribe</button>
        <?php
              }
            }
          }
          // Non- Logged-in User.
          else
          {
        ?>
          <input type= "text" class="<?php if (isset($errors['newsletteremail'])) : ?>input-error<?php endif; ?>" name="newsletteremail" value="" placeholder="xyz@gmail.com">
          <button type="submit" name="subscribe">Subscribe</button>
        <?php         
          }
        ?>
      </form>
      <?php
        // Validation Error
        if(isset($errors))
        {
          if (count($errors) > 0) 
          {
            foreach ($errors as $key => $value) 
            {
              echo '<div class="alert-danger"><b>' . $value . '</b></div>';
            }
          }
        }
      ?>
    </div>

<!-- Newsletter ends -->
>>>>>>> Stashed changes

            if(isset($_SESSION['loggedin']))
            {

            }
            else
            {

            }
          ?>
        </div> 
      </div>

<!-- Newsletter Ends. -->

  <?php

    if (isset($_GET['pageno'])) 
    {
      $pageno = $_GET['pageno'];
     } 
    else 
    {
      $pageno = 1;
    }

  // Number of blogs to be shown on a single page. For Pagination.
  $no_of_records_per_page = 5;  
  $offset = ($pageno-1) * $no_of_records_per_page;

  // Counting the number of blogs user have of his own
  $result = $source->countAllBlog(); 
  $total_rows = $method->fetchArray($result)[0];

  // CEIL is used to roundoff.
  $total_pages = ceil($total_rows / $no_of_records_per_page);
  $result = $source->fetchBlogPaging($offset, $no_of_records_per_page);
  
  if($result->num_rows > 0)
  {
    while ($row = $method->fetchAssoc($result))
    {
      $id = $row['id'];
      $heading = $row['Heading'];
      $content=$row['content'];
?>
      <div class="blogbox">
        <h2><?php echo strtoupper($heading);?></h2>
        <p>
        <?php 
        { 
          $content = substr($content,0,150);
          echo $content; 
        }
        ?>
        </p>
        <p><a href="article.php?Heading=<?php echo $heading; ?>&id=<?php echo $id;?>">Read More</a></p>
      </div>
<?php
    }
  }
  else
  {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>There are no posts added</strong> .</div>';
  }
?>
  <div class="paging">
    <ul>
      <li><a href="?pageno=1">First</a></li>
      <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
      </li>
      <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
        <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
      </li>
      <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul>
  </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  
  <?php include 'footer.php';?>