<?php include './header.php'; 

include("connection.php"); 

   if (isset($_POST['submit'])) 
   {
      $fname=$_POST['fname']; //post fname is coming from the UI and getting stored into fname
      $lname=$_POST['lname'];
      $email=$_POST['email'];
      $pass=md5($_POST['password']); //password is from UI that getting stored in pass
      $repass=md5($_POST['repassword']);
   
      if (!empty($_POST['fname']))  //fname
      {
         $fname = htmlspecialchars($_POST['fname']);
      }
      else
      {
         $fname = null;
      }
      if (!empty($_POST['lname']))  //lname
      {
         $fname = htmlspecialchars($_POST['lname']);
      }
      else
      {
         $lname = null;
      }
    
      if (!empty($_POST['email'])) //email
      { 
         $email = htmlspecialchars($_POST['email']);
      }
      else
      {
          $email = null;
      }
   
      if (!empty($_POST['password'])) //pass
      {
         $pass = htmlspecialchars($_POST['password']);
      } 
      else 
      {
         $pass = null;
      }
   
      if (!empty($_POST['repassword']))  //repass
      {
         $repass = htmlspecialchars($_POST['repassword']);
      }
      else 
      {
         $repass = null;
      }
     
      $errors = array();
         if ($fname == null) 
         {
          $errors['fname'] = 'Fname is required.';
         }
         if ($lname == null) 
         {
          $errors['lname'] = 'Lname is required.';
         }   
         if ($pass == null) 
         {
         $errors['pass'] = 'Password is required.';
         }
         if ($repass == null) 
         {
          $errors['repass'] = 'Confirm Password is required.';
         }
         if ($pass != null && $repass != null)
         {  
            if($pass != $repass)
            {
               $errors['check'] = 'Password and Confirm Password does not matched.';
            }
         } 
         if ($email == null) 
            {
               $errors['email'] = 'Email-Id is required.';
            }   
         else 
         {
            $sql = "Select * from user where emailid = '$email'";  //checking the entered email id with the existing email id's
            $res = mysqli_query($conn,$sql); //mapping to the db
            $row = mysqli_num_rows($res); 
            //echo $row;
            if($row >=  1)
            {
               $errors['email'] = 'This email id is already taken';
            }
         }
             
         if(!count($errors)>0) //register
            {    
               $result="INSERT INTO `user` (`fname`, `lname`, `emailid`, `password`) VALUES ('$fname','$lname','$email','$pass')";
               $run=mysqli_query($conn,$result);
               if($run)
                  {
                     $alert = true;
                     $_SESSION['fname'] = $fname;
                     $_SESSION['lname'] = $lname;
                     $_SESSION['email'] = $email;
                     //$_SESSION['id'] = $id;
                     $success = true;
                     $_SESSION['success'] = $success ;
                     header('location:blogslogin.php');
                        //$login = mysqli_query($conn,`select * from user where emailid = '$email' `);  
                        //header("refresh:3,url=blogs.php");
                  }
               else
                  // echo $fname," ",$lname," ", $email," ", $pass, " " ,$repass ; //printing all the values entered by the new user.
               {       
                  $errors['check'] = 'Registration failed. Please check your Credentials';
               }
            }
   }        
?>

<?php 
if (isset($errors)) {
   if (count($errors) > 0) {
      foreach ($errors as $key => $value) {
         echo '<div class="warning">' . $value . '</div>';
      }
   }
}
?>
   <div class="registrationpage">
      <article class="regform">
         <form method="POST">
            <h2><u>Create Account</u></h2>
               <div class="formcontent">
                   <i class="fa fa-user"></i>
                   <input type="text" name="fname" placeholder = "First Name" class=" <?php if (isset($errors['fname'])) : ?> input-error<?php endif ; ?>" value="<?php if (isset($_POST['fname'])) { echo $fname; } ?>">
               </div>
            
               <div class="formcontent">
                  <i class="fa fa-user"></i> 
                  <input type="text" name="lname" placeholder = "Last Name" class=" <?php if (isset($errors['lname']) || isset($errors['lname'])): ?>input-error<?php endif; ?>" value="<?php if (isset($_POST['lname'])) { echo $lname; } ?>">
               </div>
            
               <div class="formcontent">
                  <i class="fa fa-user"></i>
                  <input type="text" name="email" placeholder = "xzy@gmail.com" class=" <?php if (isset($errors['check']) || isset($errors['email'])): ?>input-error<?php endif; ?>" value="<?php if (isset($_POST['email'])) { echo $email; } ?>">
               </div>
         
               <div class="formcontent">
                  <i class="fa fa-lock"></i>
                  <input type="password" name="password" placeholder = "*****" class="<?php if (isset($errors['check']) || isset($errors['pass'])): ?>input-error<?php endif; ?>" value="<?php if (isset($_POST['pass'])) {  echo $pass; } ?>">
               </div>
            
               <div class="formcontent">
                  <i class="fa fa-lock"></i>
                  <input type="password" name="repassword" placeholder = "*****"  class="<?php if (isset($errors['check']) || isset($errors['pass'])): ?>input-error<?php endif; ?>" value="<?php if (isset($_POST['pass'])) {  echo $pass; } ?>">
               </div>
            
               <button type="submit" name="submit" class="" >Create Account</button>
            
               <div class="formcontent">      
                  <p class="text-center">Have an account? <a class="" style="cursor:pointer;" href="login.php"><u><b>Login <b></u></a></p>
               </div>
         </form>
      </article>
   </div>
   <!-- card.// -->



<script src="https://cdnjs.cloudflare.com/ajax/libs/es6-shim/0.35.3/es6-shim.min.js"></script>    
<script src="/vendors/formvalidation/dist/js/FormValidation.min.js"></script>
<script src="/vendors/formvalidation/dist/js/plugins/Tachyons.min.js"></script>
<!-- <script>
   function openTab(evt, tabname) {
     var i, tabcontent, tablinks;
   
     tabcontent = document.getElementsByClassName("tabcontent");
     for (i = 0; i < tabcontent.length; i++) {
       tabcontent[i].style.display = "none";
     }
     tablinks = document.getElementsByClassName("tablinks");
     for (i = 0; i < tablinks.length; i++) {
       tablinks[i].className = tablinks[i].className.replace(" active", "");
     }
     document.getElementById(tabname).style.display = "block";
     evt.currentTarget.className += " active";
   }   
   // Get the element with id="defaultOpen" and click on it
   document.getElementById("defaultOpen").click();

</script> -->
<!-- <script src="../js/validation.js"></script> -->
<?php include './footer.php'; ?>