<?php 

require_once ($_SERVER['DOCUMENT_ROOT'] .'/header.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/blog.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/carousel.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/user.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/method.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/newsletter.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/language.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/model/stringmodel.php');


$blog = new blogQuery\blog;
$carousel = new carouselQuery\carousel;
$user = new userQuery\user;
$method = new methodQuery\method;
$newsletter = new newsletterQuery\newsletter;
$language = new languageQuery\language;
$stringmodel = new stringQuery\stringmodel;

// Carousel.
$result1 = $carousel->carousel("SELECT * FROM carousel");

// Checking if the cache is already been set or not, so that the cache will not be made each time user comes to this home page.
// Cookie is set for #30 days and "/" refers here that this cookie is availale for all the website pages.
if($_COOKIE['cookiename'] == "")
{
  setcookie('cookiename',$cookiename,time() + (86400 * 30), "/");
}
else
{
}
  
?>  

<!-- Carousel Start -->

      <div class="demo carousel slide" data-ride="carousel">
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
<!-- Carousel ends -->


<!-- Newsletter start -->
<?php

// NEWSLETTER Logic.
// User logged in or not.
if(isset($_SESSION['loggedin']))
  { 
    $email = $_SESSION['email'];
    // Logged in user.
    if(isset($_POST['subscribe']))
    {
      $subscribe = $newsletter->insert($email); 
      echo '<div class="alert alert-success"><b>Thank You for Subscribing.</b></div>'; 
    }
    if(isset($_POST['usersubscribe']))
    {
      $unsubscribe = $newsletter->updateSubscribe($email);
      echo '<div class="alert alert-success"><b>Thank You for Subscribing again !.</b></div>'; 
    }
    if(isset($_POST['userunsubscribe']))
    {
      $unsubscribe = $newsletter->updateUnSubscribe($email);
      echo '<div class="alert alert-success"><b>You are successfully Un-Subscribed for Newsletter.</b></div>'; 
    }
  }
  // Non- logged in user.
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
        if($method->numRows($newsletterquery))
        {
          echo '<div class="alert-danger"> This email-id is already subscribed for Newsletter. Please try with some different email-id.</div>';
        }
        else
        {
          $newsletter->insert($newsletteremail);
          echo '<div class="alert alert-success"><b>Thank You for Subscribing.</b></div>';
        }
      }
      // Validation.
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
  <!-- Newsletter Form  -->
    <div class="container newsletter">
      <div class="row"><div class ="">
      <h2>* To get updates of our newly updated or added blogs, Please Subscribe. * </h2>
      <form action="" method="POST">
        <?php 
          // If user is logged in then, no need to show the input box.
          if(isset($_SESSION['loggedin']))
          {
            $email = $_SESSION['email'];
            $newsletterquery = $newsletter->subscribe($email);
            // If user is details are not there in subscribe table or not.
            if($method->numRows($newsletterquery) < 1)
            { 
        ?>
              <button class="row-sm-6 btn" type = "submit" name="subscribe">Subscribe</button>  
        <?php
            }
            // If user details are there in the subscribe table.
            else
            {
              // Check if user has already subscribed or not.
              $row = $method->fetchAssoc($newsletterquery);
              if($row['subscribe'] == 1)
              {
        ?> 
                <button class="row-sm-6 btn" type = "submit" name="userunsubscribe"><b>Un-Subscribe</b></button>
        <?php
              }
              else
              {
        ?>
                <button class="row-sm-6 btn" type = "submit" name="usersubscribe"><b>Subscribe</b></button>
        <?php
              }
            }
          }
          // Non logged-in User.
          else
          {
        ?>
        <div class="col">
          <input dir="<?php echo $rtl;?>" type= "text" class="row-sm-6 <?php if (isset($errors['newsletteremail'])) : ?>input-error<?php endif; ?>" name="newsletteremail" value="" placeholder="xyz@gmail.com">
          <button class="row-sm-6 btn" type="submit" name="subscribe">Subscribe</button>
        </div>
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
      </div></div>
    </div>

<!-- Newsletter ends -->

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
  $result = $blog->countAllBlog(); 
  $total_rows = $method->fetchArray($result)[0];
  // CEIL is used to roundoff.
  $total_pages = ceil($total_rows / $no_of_records_per_page);
  // Fetching blogs of language whose prefix is available in cookie.
  $ck = $_COOKIE['cookiename'];
  $result = $blog->fetchBlogPaging($ck, $offset, $no_of_records_per_page);
?>

  <!-- Displaying all the Blogs. -->
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <?php
        if($result->num_rows > 0)
        {
          while ($row = $method->fetchAssoc($result))
          {
            $id = $row['id'];
            $heading = $row['Heading'];
            $content=$row['content'];
        ?>
            <div dir="<?php echo $rtl;?>" class="blogbox ">
              <h2><?php echo strtoupper($heading);?></h2>
              <p>
        <?php 
              // Showing only 150  words from content of blog.
              $content = substr($content,0,150);
              echo $content; 
        ?>
              </p>
              <p><a href="<?php echo $_COOKIE['cookiename']; ?>/article/<?php echo $id;?>/<?php echo $heading; ?>"><?php $stringmodel->stringTranslate('Read More'); ?></a></p>
            </div>
        <?php
          }
        ?>  
      </div>
      
     
      <!-- Listing all the available languages. -->
      <div class="col-md-4">
        <div dir="<?php echo $rtl;?>" class="<?php echo $rtldir; ?> languagemenu">
          <form action = "/langsubmit" method = "POST">
            <label class="m-lg-2"><b><u><?php $stringmodel->stringTranslate('Change Language'); ?> -</u></b></label>
        <?php 
            $lang = $language->allLang();
            while($row = $lang->fetch_assoc())
            { 
              $prefix = $row['prefix'];
        ?>
              <ul>
                <li> 
                  <input type="submit" name="lang" class="btn btn-primary btn-md" value = "<?php echo $row['Name']," "; ?>"></input>
                </li>
              </ul>  
        <?php
            }
        ?>
          </form>
        </div>
      </div>
      <?php
        }
        else
        {
      ?>    
          <div class="col-md-8">
      <?php
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>There are no posts added</strong>.</div>';
      ?>  
          </div>
      <?php      
        }
      ?>
    </div>
  </div>


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