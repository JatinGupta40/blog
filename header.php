<?php 
  if (!isset($_SESSION)) 
  {
    session_start();
  }

require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/connection.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/header.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/blog.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/carousel.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/user.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/method.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/model/stringmodel.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/language.php');

$blog = new blogQuery\blog;
$carousel = new carouselQuery\carousel;
$user = new userQuery\user;
$method = new methodQuery\method;
$stringmodel = new stringQuery\stringmodel;
$language = new languageQuery\language;

?>

<!DOCTYPE html>
<!-- For RTL. -->
<?php
  $languagecheck = $language->checkLangDirection($_COOKIE['cookiename']);
  $fetch = $method->fetchArray($languagecheck)[0];
  if($fetch == "rtl")
  {
    $rtldir = "rtlright"; // Used as Class to rectify the css that shows all the available language (Index Page).
    $rtl = "rtl";
  }
  else
  {
    $rtl = " ";
    $rtldir = " ";
  } 
?>  
<head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <base href="http://blog/">
      <title>Blogging</title>
      <link rel="icon" type="image/ico" href="images/logo1.jpg"> 
      <meta content="" name="description">
      <meta content="" name="keywords">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
      
      <link rel="stylesheet" type="text/css" href="/assets/css/main.css?nounce=<?php echo time(); ?>">
      <!-- Vendor CSS and JS Files -->
      <link href="assets/vendor/aos/aos.css" rel="stylesheet">
      <link href="assets/js/bootstrap.bundle.js">
      <link href="assets/js/bootstrap.bundle.min.js">
      <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
      <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
      <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
      <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
      <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
      <link href="assets/vendor/bootstrap/css/" rel="stylesheet">
      <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">      
      <link rel="stylesheet" href="https://unpkg.com/tachyons@4.10.0/css/tachyons.min.css">
      <link rel="stylesheet" href="/vendors/formvalidation/dist/css/formValidation.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="assets/vendor/bootstrap/js/bootstrap.js"></script>
      <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
      <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      
   </head>
   <body>
    
      <!-- ======= Header start ======= -->
    <div>
      <header>
        <div class="header">  
          <div class="headcontent">
            <a href="javascript:void(0);" class="menu-toggle icon" >
              <i class="fa fa-bars"></i>
            </a> 
            <h1><a href="<?php echo $_COOKIE['cookiename']; ?>/index"><?php $stringmodel->stringTranslate('Blogging'); ?></a></h1>
            <!-- <i class="bi bi-list mobile-nav-toggle" style="color:black;"></i>     -->
          </div>
          <!-- In 'dir' the $rtl is coming from top for the language whose directions is RTL. -->
          <div dir="<?php echo $rtldir ; ?>" class="navbar">
            <nav>
              <ul>
              <?php 
              // Checking whether user/admin is logged-in or not.
              if(isset($_SESSION['loggedin']) || isset($_SESSION['success']))
              {
              ?>
                <li class="active"><a><u><?php $stringmodel->stringTranslate('Hello'); ?>- <?php echo ucfirst($_SESSION['fname'])," ", ucfirst($_SESSION['lname']);?></u></a></li>
                <?php
                // For Admin Dashboard.
                if($_SESSION['email'] == "admin@gmail.com")
                { 
                ?>
                <u><li><a href="<?php echo $_COOKIE['cookiename']; ?>/dashboard"><u><?php $stringmodel->stringTranslate('Dashboard'); ?></u></a></li></u>
                <?php
                }
                ?>
                <li><a href="<?php echo $_COOKIE['cookiename']; ?>/personalisedcarousel"><u><?php $stringmodel->stringTranslate('Carousel'); ?></u></a></li>
                <li><a href="<?php echo $_COOKIE['cookiename']; ?>/blogslogin"><u><?php $stringmodel->stringTranslate('My Blogs'); ?></u></a></li>
                <li><a href="<?php echo $_COOKIE['cookiename']; ?>/logout"><u><?php $stringmodel->stringTranslate('Logout'); ?></u></a></li>
              <?php 
              }
              else
              {
              ?>
                <li><a href="<?php echo $_COOKIE['cookiename']; ?>/register"><i class="fa fa-user" aria-hidden="true"></i>&nbsp <?php $stringmodel->stringTranslate('Register'); ?></a></li>
                <li><a href="<?php echo $_COOKIE['cookiename']; ?>/login"><i class="fa fa-user" aria-hidden="true"></i> &nbsp <?php $stringmodel->stringTranslate('Login'); ?></a></li>
              <?php
              }
              ?>
              </ul>
            </nav>   
          </div>
          <div class="searchbar"> 
            <form action="<?php echo $_COOKIE['cookiename']; ?>/search/<?php echo $_POST['search'] ?>">
              <input dir = "<?php echo $rtl; ?>" class="form-control" type="text" name="search" placeholder="<?php $stringmodel->stringTranslate('Search'); ?>" value="<?php echo $_GET['search'];  ?>">
              <button><?php $stringmodel->stringTranslate('Search'); ?></button>
            </form>
          </div>
        </div>
      </header>
    </div>
      <!-- End Header -->
     

<script>
// For hamburger responsive/   
flag = false;
document.querySelector('.icon').addEventListener('click', () => {
    if (!flag) {
        document.querySelector('.menu-toggle').classList.add('menu-untoggle');  // Toggle/click to open.
        document.querySelector('.navbar').setAttribute("style", "display: flex;");
        flag = true;
    } else {
       document.querySelector('.menu-toggle').classList.remove('menu-untoggle');   // Toggle/click to close.
        document.querySelector('.navbar').setAttribute("style", "display: none;");
        flag = false;
    }
});
</script>









      
                