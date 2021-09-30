<?php
    include 'header.php';
    include('connection.php');
    include 'classes/method.php';
      
    // Creating Object.
    $method = new method;
    $source = new sourceQuery\source;
  
    if (isset($_POST['password']) && $_POST['reset_link_token'] && $_POST['email']) 
    {
      $email = $_POST['email'];
        
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
          echo '<div class="alert alert-danger">' . $value . '</div>';
        }
        // Getting token and email of user.
        $query = $source->selectToken($code, $email);
        $curDate = date("Y-m-d H:i:s");
        if ($method->numRows($query) > 0) 
        {
          $row = $method->fetchArray($query);
          if ($row['exp_date'] >= $curDate) 
          { 
?>
<?php     
          }
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
        $query = $source->selectToken($code, $email);
        $row = $method->numRows($query);
        if ($row) 
        {
          $password = md5($password);
          $source->updatePassword($password, $email);
          header("Refresh:5; url=login.php");
?>
          <div class="alert alert-success">
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
      $query = mysqli_query($conn,"SELECT * FROM `user` WHERE `reset_link_token`='" . $code . "' and `emailid`='" . $email . "';");
      $curDate = date("Y-m-d H:i:s");
      if (mysqli_num_rows($query) > 0) 
      {
        $row = mysqli_fetch_array($query);
        if ($row['exp_date'] >= $curDate) 
        { 
?>
          <div class="newpwd">
            <form action="" method="post">
              <h2>Create New Password</h2>
              <div class="input-group">
                <input type="hidden" name="email" value="<?php echo $email; ?>">
              </div>
              <div class="input-group">
                <input type="hidden" name="reset_link_token" value="<?php echo $code; ?>">
              </div>
              <div class="pwd">
                <label for="exampleInputEmail1">Password : </label>
                <input type="password" name='password' class="form-control <?php if (isset($errors['password'])) : ?>input-error<?php endif; ?>" value="<?php if (isset($_POST['password'])) { echo $password; } ?>">
              </div>
              <div class="pwd">
                <label for="exampleInputEmail1">Confirm Password : </label>
                <input type="password" name='password2' class="form-control <?php if (isset($errors['password2'])) : ?>input-error<?php endif; ?>" value="<?php if (isset($_POST['password2'])) { echo $password2; } ?>">
              </div>
              <div class="pwd">
                <button type="submit" name="submit" class="btn">SUBMIT</button>
              </div>
            </form>
          </div>
<?php 
        }
      }  
    }
    else
    { 
?>
      <p>This forget password link has been expired</p>
<?php
    }
?>
</body>
</html>