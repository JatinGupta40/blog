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

   if (isset($_POST['submit'])) 
   {
     $data = 
       [
         'fname' => $_POST['fname'], // Post fname is coming from the UI and getting stored into fname.
         'lname'=> $_POST['lname'],
         'email' => $_POST['email'],
         'pass' => md5($_POST['password']), // Password is from UI that getting stored in pass.
         'repass' => md5($_POST['repassword'])
       ];
      
      // Validation.
      if (!empty($data['fname']))  // Fname.
      {
        $fname = htmlspecialchars($data['fname']);
      }
      else
      {
        $fname = null;
      }
      
      if (!empty($data['lname']))  // Lname.
      {
        $lname = htmlspecialchars($data['lname']);
      }
      else
      {
        $lname = null;
      }
    
      if (!empty($data['email'])) // Email.
      { 
        $email = htmlspecialchars($data['email']);
      }
      else
      {
        $email = null;
      }
   
      if (!empty($data['pass'])) // Pass.
      {
        $pass = htmlspecialchars($data['pass']);
      } 
      else 
      {
        $pass = null;
      }
   
      if (!empty($data['repass']))  // Repass.
      {
        $repass = htmlspecialchars($data['repass']);
      }
      else 
      {
        $repass = null;
      }
     
      $errors = array();
      if($fname == null) 
      {
        $errors['fname'] = 'Fname is required.';
      }

      if($lname == null) 
      {
        $errors['lname'] = 'Lname is required.';
      }

      if ($email == null) 
      {
        $errors['email'] = 'Email-Id is required.';
      }
      else 
      {
        // Checking the entered email id with the existing email id's.
        $sql = $user->checkEmail($email); 
        print_r($sql);
        //die();
        if(!empty($sql))
        {
          $row = $method->numRows($sql);
          if($row >=  1)
          {
            $errors['email'] = 'This email id is already taken';
          }
        }
      }
      
      if($pass == null) 
      {
        $errors['pass'] = 'Password is required.';
      }
      
      if($repass == null) 
      {
        $errors['repass'] = 'Confirm Password is required.';
      }
      
      if($pass != null && $repass != null)
      {  
        if($pass != $repass)
        {
          $errors['check'] = 'Password and Confirm Password does not matched.';
        }
      } 
      
      // Register User.
      if(!count($errors)>0) 
      {   
        if($user->insertUserDetails($fname, $lname, $email, $pass))
        {

          $alert = true;
          $_SESSION['fname'] = $fname;
          $_SESSION['lname'] = $lname;
          $_SESSION['email'] = $email;
          $_SESSION['password'] = $password;
          $success = true;
          $_SESSION['success'] = $success ;
          header('location:blogslogin');
        }
        else
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
    <article class="container regform">
      <form dir="<?php echo $rtl; ?>" method="POST">
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
            <p>Have an account? <a class="" style="cursor:pointer;" href="<?php echo $_COOKIE['cookiename'];  ?>/login"><u><b>Login <b></u></a></p>
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