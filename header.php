<?php 
  if (!isset($_SESSION)) 
  {
    session_start();
  }

?>

<!DOCTYPE html>
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Blogging</title>
      <link rel="icon" type="image/ico" href="images/logo1.jpg"> 
      <meta content="" name="description">
      <meta content="" name="keywords">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/main.css?nounce=<?php echo time(); ?>">
      <!-- <link href="assets/vendor/aos/aos.css" rel="stylesheet">
      <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
      <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
      <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
      <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
      <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"> -->

   </head>
   <body>
    
      <!-- ======= Header start ======= -->
      <header>
        <div class="header">  
          <div class="headcontent">
            <a href="javascript:void(0);" class="menu-toggle icon" >
              <i class="fa fa-bars"></i>
            </a> 
            <h1><a href="index.php">Blogging</a></h1>
            <i class="bi bi-list mobile-nav-toggle" style="color:black;"></i>    
          </div>
          <div class="navbar">
            <nav>
              <ul>
              <?php 
              if(isset($_SESSION['loggedin']) || isset($_SESSION['success']))
              {
              ?>
                <!-- If user is logged in -->  
                <li class="active"><a><u>Hello - <?php echo ucfirst($_SESSION['fname'])," ", ucfirst($_SESSION['lname']);?></u></a></li>
                <li><a href="personalisedcarousel.php">Carousel</a></li>
                <li><a href="blogslogin.php">My Blogs</a></li>
                <li><a href="logout.php">Logout</a></li>
              <?php 
              }
              else
              {
              ?>
                <!-- If user is logged off -->
                <li><a href="register.php"><i class="fa fa-user" aria-hidden="true"></i> &nbsp Register</a></li>
                <li><a href="login.php"><i class="fa fa-user" aria-hidden="true"></i> &nbsp Login</a></li>
              <?php
              }
              ?>
              </ul>
            </nav>   
          </div>
          <div class="searchbar"> 
            <form action="search.php">
              <input class="" type="search" name="search" placeholder="Search">
              <button>Search</button>
            </form>
          </div>
        </div>
      </header>
      <!-- End Header -->

<script>
// For hamburger responsive.
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









      
                