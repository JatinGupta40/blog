<?php include './header.php'; ?>

<div class="tab">
   <button class="tablinks" onclick="openCity(event, 'Registration')" >Registration</button>
   <button class="tablinks" onclick="openCity(event, 'Login')" id="defaultOpen">Login</button>
</div>
<div id="Registration" class="tabcontent">
   <div class="registrationpage page card bg-light">
      <article class="card-body mx-auto">
         <h4 class="card-title mt-3 text-center">Create Account</h4>
         <form action="signup.php" id="contactform" method="POST">
            <div class="form-group input-group">
               <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-user"></i> </span>
               </div>
               <input id="fname" name="fname" class="form-control" placeholder="First name" type="text" required> 
            </div>
            <!-- form-group// -->
            <div class="form-group input-group">
               <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-user"></i> </span>
               </div>
               <input id="lname" name="lname" class="form-control" placeholder="Last name" type="text" required>
            </div>
            <!-- form-group// -->
            <div class="form-group input-group">
               <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
               </div>
               <input id="email" name="email" class="form-control" placeholder="Email address" type="email" required>
            </div>
            <!-- form-group// -->
            <div class="form-group input-group">
               <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
               </div>
               <input class="form-control" id="password" name="password" placeholder="Create password" type="password" required>
            </div>
            <!-- form-group// -->
            <div class="form-group input-group">
               <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
               </div>
               <input class="form-control" id="repassword" name="repassword" placeholder="Repeat password" type="password" required>
            </div>
            <!-- form-group// -->   
            <div class="form-group">
               <button type="submit" class="btn btn-primary btn-block" name="register" id="submit"> Create Account  </button>
            </div>
            <!-- form-group// -->      
            <p class="text-center">Have an account? <a href="login.php">Log In</a> </p>
         </form>
      </article>
   </div>
   <!-- card.// -->
</div>
</div>
<div id="Login" class="tabcontent">
   <div class="loginpage card bg-light">
      <article class="card-body mx-auto" style="max-width: 400px;">
         <h4 class="card-title mt-3 text-center">LOGIN</h4>
         <form action="signup.php" id="contactform" method="POST">
            <div class="form-group input-group">
               <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
               </div>
               <input id="email" name="email" class="form-control" placeholder="Email address" type="email"> required
            </div>
            <!-- form-group// -->
            <div class="form-group input-group">
               <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
               </div>
               <input class="form-control" id="password" name="password" placeholder="Password" type="password" required>
            </div>
            <!-- form-group// -->
            <div class="form-group">
               <button type="submit" class="btn btn-primary btn-block" name="login" id="submit"> LOGIN </button>
            </div>
            <!-- form-group// -->      
         </form>
      </article>
   </div>
   <!-- card.// -->
</div>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;

  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>


<?php include './footer.php'; ?>
</body>
</html>