<?php include './header.php'; 
   //session_start();
    include("connection.php");
    
    if(isset($_POST['submit']))
    {
        $email = $_POST['email'];  //$_POST email is getting the values from the login page and pushing it to the variable
        $pass = $_POST['pass'];

      if (!empty($_POST['email'])) {
         $email = htmlspecialchars($_POST['email']);
      }
      else {
         $email = null;
      }

      if (!empty($_POST['pass'])) {
         $pass = htmlspecialchars($_POST['pass']);
      } else {
         $pass = null;
      }

      $errors = array();

      if ($email == null) {
         $errors['email'] = 'Email-Id is required.';
      }

      if ($pass == null) {
         $errors['pass'] = 'Password is required.';
      }
      else{
         
     
      $pass1 = md5($pass);
         $query = "select * from user where emailid = '$email'and password = '$pass1'"; //emailid and password are the db name and email and pass are the variabe name that we get above
         $res = mysqli_query($conn,$query) or die(mysqli_error($conn));
         $result = mysqli_num_rows($res);
        //echo $result;
        if($result == 1)
        {
            $rows = mysqli_fetch_assoc($res);
               $_SESSION['id'] = $rows['id'];
               $_SESSION['fname'] = $rows['fname'];
               $_SESSION['lname'] = $rows['lname'];
               $_SESSION['email'] = $rows['emailid'];
               $_SESSION['loggedin'] = true; 
               $success = false;      //for registration page message
               $_SESSION['success'] = $success ;
               // $pass = $rows['password'];
               //echo  $_SESSION['id'], $_SESSION['fname'], $_SESSION['lname'] , $_SESSION['email'] ;
               // echo ;
                header("location:blogslogin.php");
         }
         elseif($email=="admin@gmail.com" && $pass =="21232f297a57a5a743894a0e4a801fc3")
         {
            $_SESSION['fname'] = $rows['fname'];
            $_SESSION['id'] = $rows['id'];
            $_SESSION['lname'] = $rows['lname'];
            $_SESSION['email'] = $rows['emailid']; 
            header("location:blogslogin.php");
         }
         else 
         {
            $errors['check'] = 'Invalid Email or Password';
         }
         
      }
    }
?>
<?php

 if(isset($errors))
 {
   if (count($errors) > 0) 
   {
      foreach ($errors as $key => $value) 
      {
         echo '<div class="alert alert-danger">' . $value . '</div>';
      }
   }
 }
?>
<!-- LOGIN PART -->
   <div class="registrationpage">
      <article class="regform">
         <form method="POST">
            <h2 class="">LOGIN</h2>
         
            <div class="formcontent">
               <i class="fa fa-envelope"></i>
               <input type="text" name="email" class="form-control <?php if (isset($errors['check']) || isset($errors['email'])) : ?>input-error<?php endif; ?>" placeholder = "xzy@gmail.com" value="<?php if (isset($_POST['email'])) { echo $email; } ?>">
            </div>
            
            <div class="formcontent">
               <i class="fa fa-lock"></i>
               <input type="password" name="pass" class="form-control <?php if (isset($errors['check']) || isset($errors['pass'])) : ?>input-error<?php endif; ?>" placeholder = "*****" value="<?php if (isset($_POST['pass'])) { echo $pass; } ?>">
            </div>
            
            <button type="submit" class="btn btn-primary btn-block" name="submit"> LOGIN  </button>
          
            <div class="formcontent">
               <a href="forgotpwd.php"><p>Forgotten Password?</p></a> 
            </div>
            
         </form>
      </article>
   </div>
   <!-- card.// -->

<?php include './footer.php'; ?>