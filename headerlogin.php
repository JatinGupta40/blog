<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Blogging</title>
      <link rel="icon" type="image/ico" href="images/logo1.jpeg">
      <meta content="" name="description">
      <meta content="" name="keywords">
      <!-- Favicons
      <link href="assets/img/favicon.png" rel="icon">
      <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->
      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
      <!-- Vendor CSS Files -->
      <link href="assets/vendor/aos/aos.css" rel="stylesheet">
      <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
      <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
      <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
      <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
      <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
      <!-- For registration LOGIN-->
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
      
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://unpkg.com/tachyons@4.10.0/css/tachyons.min.css">
      <link rel="stylesheet" href="/vendors/formvalidation/dist/css/formValidation.min.css">
      <!-- Template Main CSS File -->
      <link rel="stylesheet" href="style.css">
   </head>
   <body class="d-flex flex-column min-vh-100">
      <!-- ======= Header ======= -->
      <div>
         <header id="header" class="fixed-top ">
            <div class="container d-flex align-items-center">
               <h1 class="logo me-auto"><a href="index.php"><i>Blogging</i></a></h1>
               <nav id="navbar" class="navbar">
                  <ul>
                  <?php include_once("validation.php");
                      //  $sql = 'select * user where emailid = '$email'';
                       // echo $sql;
                  ?> 
                     <!-- <li><a class="nav-link scrollto" href="#hero">Home</a></li> -->
                     <li><a class="nav-link" href="blogs.php">Hello - <?php echo $_SESSION['fname'], " ", $_SESSION['lname'];?></a></li>
                     <?php 
                     if($_SESSION['loggedin'])
                     {
                       // echo "true";
                        ?>
                        <li><a class="nav-link" href="logout.php">Logout</a></li>
                    <?php }
                     ?>
                     
                     <!-- <li><a class="nav-link" href="register.php"><i class="fa fa-user" aria-hidden="true"></i> &nbsp Register</a></li> -->
                  </ul>
                  <i class="bi bi-list mobile-nav-toggle" style="color:black;"></i>
               </nav>
               <!-- .navbar -->
            </div>
         </header>
         <!-- End Header -->
      </div>