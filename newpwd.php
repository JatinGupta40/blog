<?php
    include 'header.php';
    include('connection.php');
    if (isset($_POST['password']) && $_POST['reset_link_token'] && $_POST['email']) 
    {
        $email = $_POST['email'];
        //echo $email;
        $code = $_POST['reset_link_token'];

        if (!empty($_POST['password'])) 
        {
            $password = htmlspecialchars($_POST['password']);
        }
        else 
        {
            $password = null;
        }

        $errors=array();

        if (!empty($_POST['password2'])) 
        {
            $password2 = htmlspecialchars($_POST['password2']);
        } 
        else 
        {
            $password2 = null;
        }

        if ($password == null) 
        {
            $errors['password'] = 'Password is required.';
        }

        if ($password2 == null) 
        {
            $errors['password2'] = 'Confirmed Password is required.';
        }

        if ($password != null && $password2 != null) 
        {
            if (strcmp($password, $password2)) 
            {
                $errors['password_mismatch'] = 'Confirmed password should be same as the password.';
            }
        }

        if (count($errors) > 0) 
        {
            foreach ($errors as $key => $value) 
            {
                echo '<div class="form-error">' . $value . '</div>';
            }

            $query = mysqli_query($conn,"SELECT * FROM user WHERE reset_link_token='" . $code . "' and emailid='" . $email . "';");
            $curDate = date("Y-m-d H:i:s");
            if (mysqli_num_rows($query) > 0) 
            {
                $row = mysqli_fetch_array($query);
                if ($row['exp_date'] >= $curDate) 
                { 
?>
<?php           }
            }
            else
            {
?>
<?php
             }
        }
        else
        {
?>

<?php
            $email = $_POST['email'];
            $code = $_POST['reset_link_token'];
            $query = mysqli_query($conn, "SELECT * FROM user WHERE reset_link_token='" . $code . "' and emailid='" . $email . "'");
            $row = mysqli_num_rows($query);
            if ($row) 
            {
                $password = md5($password);
                mysqli_query($conn, "UPDATE user set  password='" . $password . "', reset_link_token=NULL, exp_date=NULL WHERE emailid='" . $email . "'");
                header("Refresh:5; url=login.php");
?>
                <div class="success">
                    <p>Your password has been updated successfully.</p>
                    <p>You will be redirected to login within 5 seconds. If it doesn't redirect within 5 seconds, <a href="/accounts/login.php">click here</a>.</p>
                </div>
<?php
            }
            else
            {
                echo "<p>Something goes wrong. Please try again</p>";
            }
        }
    }
    if ($_GET['key'] && $_GET['code']) 
    {
      include('connection.php');
      $email = $_GET['key'];
      $code = $_GET['code'];
      $query = mysqli_query(
         $conn,
         "SELECT * FROM `user` WHERE `reset_link_token`='" . $code . "' and `emailid`='" . $email . "';"
      );
      $curDate = date("Y-m-d H:i:s");
      if (mysqli_num_rows($query) > 0) {
         $row = mysqli_fetch_array($query);
         if ($row['exp_date'] >= $curDate) { ?>
            <header>
               <h2>Create New Password</h2>
            </header>
            <form action="" method="post">
               <div class="input-group">
                  <input type="hidden" name="email" value="<?php echo $email; ?>">
               </div>
               <div class="input-group">
                  <input type="hidden" name="reset_link_token" value="<?php echo $code; ?>">
               </div>
               <!-- <div class="form-group"> -->
               <div class="input-group">
                  <label for="exampleInputEmail1">Password</label>
                  <input type="password" name='password' class="form-control <?php if (isset($errors['password'])) : ?>input-error<?php endif; ?>" value="<?php if (isset($_POST['password'])) {
                                                                                                                                                               echo $password;
                                                                                                                                                            } ?>">
               </div>
               <!-- </div>    -->
               <div class="input-group">
                  <!-- <div class="form-group"> -->
                  <label for="exampleInputEmail1">Confirm Password</label>
                  <input type="password" name='password2' class="form-control <?php if (isset($errors['password2'])) : ?>input-error<?php endif; ?>" value="<?php if (isset($_POST['password2'])) {
                                                                                                                                                               echo $password2;
                                                                                                                                                            } ?>">
               </div>
               <!-- </div> -->
               <div class="input-group">
                  <button type="submit" name="submit" class="btn">SUBMIT</button>
               </div>
            </form>
         <?php }
      }  
         
   
   }
   
   
   else{ 
      ?>
      <p>This forget password link has been expired</p>
      <?php
   }

   ?>

</body>

</html>