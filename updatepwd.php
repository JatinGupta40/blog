<?php 

  require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/blog.php'); 
  require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/carousel.php');
  require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/user.php');
  require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/method.php');
  
  $blog = new blogQuery\blog;
  $carousel = new carouselQuery\carousel;
  $user = new userQuery\user;
  $method = new methodQuery\method;
    $a = isset($_GET['pwd']);
    if(isset($_POST['submit']))
        {
            if(isset($_POST['pwd']) && isset($_POST['reset_link_token']) && $_POST['email'])
                {
                echo $_POST['pwd'];
                $email = $_POST['email'];
                $code = $_POST['reset_link_token'];
                $password = md5($_POST['password']);
                $query = mysqli_query($conn,"SELECT * FROM `user` WHERE `reset_link_token`='".$code."' and `emailid`='".$email."'");
                $row = mysqli_num_rows($query);
                    if($row)
                    {
                        mysqli_query($conn,"UPDATE users set  password='" . $password . "', reset_link_token='" . NULL . "' ,exp_date='" . NULL . "' WHERE emailid='" . $emailId . "'");
                        echo '<p>Congratulations! Your password has been updated successfully.</p>';
                    }
                    else
                    {
                        echo "<p>Something goes wrong. Please try again</p>";
                    }
            }else
            {
                echo "bhar";
            }
        }
        ?>