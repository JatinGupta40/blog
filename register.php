<?php include './header.php'; 
   $alert = false; 
   $flag = 0 ;
   
  if($_SERVER["REQUEST_METHOD"] == "POST")
  {     include("connection.php"); 

      $fname=$_POST['fname']; //post fname is coming from the UI and getting stored into fname
      $lname=$_POST['lname'];
      $email=$_POST['email'];
      $pass=md5($_POST['password']); //password is from UI that getting stored in pass
      $repass=md5($_POST['repassword']);
      
  //variable for alerting   
      //Check if user is already registered
     // echo $fname," ",$lname," ", $email," ", $pass, " " ,$repass ; //printing all the values entered by the new user.
      $sql = "Select * from user where emailid = '$email'";  //checking the entered email id with the existing email id's
      //echo $sql;
      $res = mysqli_query($conn,$sql); //mapping to the db
      
      $row = mysqli_num_rows($res); 
     //echo $row;
  
   if($pass == $repass)
   {
           if($row >=  1)
               {
                   $flag = 1;
                   //header("refresh:0,url=register.php");
                   }
                else
                   {
                    $result="INSERT INTO `user` (`fname`, `lname`, `emailid`, `password`) VALUES ('$fname','$lname','$email','$pass')";
                    $run=mysqli_query($conn,$result);
                    if($run)
                       {
                        
                        $alert = true;
                        $login = mysqli_query($conn,`select * from user where emailid = '$email' `);       
                        header("refresh:3,url=blogs.php");
                       }
                    else
                       {
                        echo "<script> alert(' Registration failed ')</script>";
                       }
                   }
               }
        else
        {
           $flag = 2;
         //  header("refresh:0,url=login.php");
        }   
   } 
   
?>

<?php 
if($alert)
{
   echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Successfully Registered!</strong> .
 
</div>';
   header('location:blogs.php');
}
else if($flag == 1)
echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                   <strong>This Email-id is already taken.</strong> .
      </div>';
else if($flag == 2)
echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Password and Confirm Password does not matched with each other !!</strong> .
      </div>';
?>
<div class="tab">
   <button class="tablinks" onclick="openTab(event, 'Registration')" id="defaultOpen">Registration</button>
   <button class="tablinks" onclick="openTab(event, 'Login')">Login</button>
</div>
<div id="Registration" class="tabcontent">
   <div class="registrationpage page card bg-light ">
      <article class="card-body mx-auto">
         <h4 class="card-title mt-3 text-center">Create Account</h4>
         <form method="POST" id="contactform" >
            <div class=" form-group input-group">
               <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-user"></i> </span>
               </div>
               <input name="fname" class="form-control" placeholder="First name" type="text" required>
            </div>
            <!-- form-group// -->
            <div class="form-group input-group">
               <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-user"></i> </span>
               </div>
               <input name="lname" class="form-control" placeholder="Last name" type="text" required>
            </div>
            <!-- form-group// -->
            <div class="form-group input-group">
               <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
               </div>
               <input  name="email" class="form-control" placeholder="Email address" type="email" required>
            </div>
            <!-- form-group// -->
            <div class="form-group input-group">
               <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
               </div>
               <input class="form-control"  name="password" placeholder="Create password" type="password" required>
            </div>
            <!-- form-group// -->
            <div class="form-group input-group">
               <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
               </div>
               <input class="form-control"  name="repassword" placeholder="Repeat password" type="password" required>
            </div>
            <!-- form-group// -->   
            <div class="form-group">
               <button type="submit" name="submit" class="btn btn-primary btn-block" >Create Account</button>
            </div>
            <!-- form-group// -->      
            <p class="text-center">Have an account? <a class="tablinks text-primary" style="cursor:pointer;"><u><b>Login <b></u></a></p>
         </form>
      </article>
   </div>
   <!-- card.// -->
</div>

<!-- LOGIN PART -->
<div id="Login" class="tabcontent">
   <div class="loginpage card bg-light">
      <article class="card-body mx-auto" style="max-width: 400px;">
         <h4 class="card-title mt-3 text-center">LOGIN</h4>
         <form action="signup.php" method="POST">
            <div class="form-group input-group">
               <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
               </div>
               <input name="email" class="form-control" placeholder="Email address" type="email" required>
            </div>
            <!-- form-group// -->
            <div class="form-group input-group">
               <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
               </div>
               <input class="form-control" name="password" placeholder="Password" type="password" required>
            </div>
            <!-- form-group// -->
            <div class="form-group">
               <button type="submit" class="btn btn-primary btn-block" name="submit"> LOGIN  </button>
            </div>
            <!-- form-group// -->      
         </form>
      </article>
   </div>
 <!-- card.// -->
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/es6-shim/0.35.3/es6-shim.min.js"></script>    
<script src="/vendors/formvalidation/dist/js/FormValidation.min.js"></script>
<script src="/vendors/formvalidation/dist/js/plugins/Tachyons.min.js"></script>
<script>
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


// (function () {
//   'use strict'

//   // Fetch all the forms we want to apply custom Bootstrap validation styles to
//   var forms = document.querySelectorAll('.needs-validation')

//   // Loop over them and prevent submission
//   Array.prototype.slice.call(forms)
//     .forEach(function (form) {
//       form.addEventListener('submit', function (event) {
//         if (!form.checkValidity()) {
//           event.preventDefault()
//           event.stopPropagation()
//         }

//         form.classList.add('was-validated')
//       }, false)
//     })
// })()

</script>
<!-- <script src="../js/validation.js"></script> -->
<?php include './footer.php'; ?>