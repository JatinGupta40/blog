<?php include './header.php'; ?>

<div class="tab">
   <button class="tablinks" onclick="openTab(event, 'Registration')" id="defaultOpen">Registration</button>
   <button class="tablinks" onclick="openTab(event, 'Login')">Login</button>
</div>
<div id="Registration" class="tabcontent">
   <div class="registrationpage page card bg-light ">
      <article class="card-body mx-auto">
         <h4 class="card-title mt-3 text-center">Create Account</h4>
         <form method="POST" action="validation.php" id="contactform" >
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