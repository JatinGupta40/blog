<?php
    include 'header.php';
    include('connection.php');
    include_once 'classes/blog.php';
    include_once 'classes/carousel.php';
    include_once 'classes/user.php';
    include_once 'classes/method.php';

    $blog = new blogQuery\blog;
    $carousel = new carouselQuery\carousel;
    $user = new userQuery\user;
    $method = new methodQuery\method;
    
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
        $query = $user->selectToken($code, $email);
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
        $query = $user->selectToken($code, $email);
        $row = $method->numRows($query);
        if ($row) 
        {
          $password = md5($password);
          $user->updatePassword($password, $email);
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
      $email = $_GET['key'];
      $code = $_GET['code'];
      $query = $user->selectToken($code, $email);
      $curDate = date("Y-m-d H:i:s");
      if ($method->numRows($query) > 0) 
      {
        $row = $method->fetchArray($query);
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