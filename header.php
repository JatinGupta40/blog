<?php session_start();
 include 'connection.php'
?>


<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Blogging</title>
      <link rel="icon" type="image/ico" href="images/logo1.jpg">  <!-- to shoq this icon in the browser tab-->
      <meta content="" name="description">
      <meta content="" name="keywords">
      <!-- Favicons
      <link href="assets/img/favicon.png" rel="icon">
      <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->
      <!-- Google Fonts -->
      <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet"> -->
      <!-- Vendor CSS Files -->
      <!-- <link href="assets/vendor/aos/aos.css" rel="stylesheet">
      <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
      <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
      <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
      <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
      <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"> -->

      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
     
      <!-- For registration LOGIN-->
      <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
       -->
      <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://unpkg.com/tachyons@4.10.0/css/tachyons.min.css">
      <link rel="stylesheet" href="/vendors/formvalidation/dist/css/formValidation.min.css"> -->
      <!-- Template Main CSS File -->
      
      <link rel="stylesheet" href="style.scss">
   </head>
   <body>
      <!-- ======= Header ======= -->
      <header>
         <div class="header"> <!-- Header start -->
        
         <div class="headcontent">
               <h1><a href="index.php"><i>Blogging</i></a></h1>
               <i class="bi bi-list    mobile-nav-toggle" style="color:black;"></i>    
               
            </div>

            <div class="searchbar"> 
               <form action="search.php">
                     <input class="" type="search" name="search" placeholder="Search">
                     <button class="" name="">Search</button>
               </form>
            </div>
            
            <div class="navbar" id="hamburger">
               <nav>
                  <ul>
                  <?php 
                     if(isset($_SESSION['loggedin']) || isset($_SESSION['success']))
                     {
                        // echo "true";  //when user is loggedin
                  ?>
                        <li><a href="blogs.php">Hello - <?php echo $_SESSION['fname'], " ", $_SESSION['lname'];?></a></li>
                        <li><a href="blogslogin.php">My Blogs</a></li>
                        <li><a href="logout.php">Logout</a></li>
                        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                            <i class="fa fa-bars"></i>
                        </a> 
                  <?php 
                     }
                    else
                    {
                  ?>
                     
                     <li><a class="scrollto" href="#hero">Home</a></li>
                     <li><a href="register.php"><i class="fa fa-user" aria-hidden="true"></i> &nbsp Register</a></li>
                     <li><a href="login.php"><i class="fa fa-user" aria-hidden="true"></i> &nbsp Login</a></li>
                     <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                        <i class="fa fa-bars"></i>
                     </a> 
                  </ul>
                  <?php
                    }
                  ?>
                 
                 
               </nav>
            </div>
         </div>   <!-- Header ends -->
            
         </header>
         <!-- End Header -->
     
         <script>   //for hamburger responsive

function myFunction() {
  var x = document.getElementById("hamburger");
  if (x.className === "navbar") {
    x.className += " responsive";
  } else {
    x.className = "navbar";
  }
}
</script>









      
                