<?php
    include 'header.php';
    include 'connection.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
  if(isset($_POST['submit']))
  {
    if(!empty($_POST['email']))
    {
      //if(isset($_POST['reset_link_token']) && $_POST['email'])
      //{}
      $email1 = htmlspecialchars($_POST['email']); //saving the user entered email in variable to keeping safe it in input box 
      if($_POST['email'])
        {
          $email = $_POST['email']; //User entered Email
          //echo $email;
          $result = mysqli_query($conn,"SELECT * FROM user where emailid='$email'");
          $row = mysqli_fetch_assoc($result);
          //print_r($result);
	        //$id=$row['id']; //db fetched id
          echo $row['exp_date'];
	        if($row) 
          {
		        $code = md5('email').rand(10,100); 
            date_default_timezone_set("Asia/Calcutta");
            //echo $code;		
            $expFormat = mktime(date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y"));
            $expDate = date("Y-m-d H:i:s",$expFormat);
            //echo $expDate;
            $sql = "UPDATE user set password='" . $password . "', reset_link_token='" . $code . "' ,exp_date='" . $expDate . "' WHERE emailid='" . $email . "'";
            //echo $sql;
            $update = mysqli_query($conn, $sql);
            //print_r($update);
            $link = "<a href='https://localhost/blogging/newpwd.php?key=".$email."&code=".$code."'>Click To Reset password</a>";
            require 'vendor/autoload.php';
            //require_once('vendor/PHPMailerAutoload.php');
            $mail = new PHPMailer();
            $mail->CharSet = "utf-8";
            $mail->IsSMTP();
            // enable SMTP authentication
            $mail->SMTPAuth = true;                  
            // GMAIL username
            $mail->Username = "autoarenacar@gmail.com";
            // GMAIL password
            $mail->Password = "jatinguptacute8800";
            $mail->SMTPSecure = "ssl";  
            // sets GMAIL as the SMTP server
            $mail->Host = "smtp.gmail.com";
            // set the SMTP port for the GMAIL server
            $mail->Port = "465";
            $mail->From='gupta.jatin40@gmail.com';
            $mail->FromName='Jatin Gupta';
            //$name = $fname.$lname;
            //echo $name;
            $mail->AddAddress($email);
            $mail->Subject  =  'Reset Password';
            $mail->IsHTML(true);
            $mail->Body    = 'Click On This Link to Reset Password '.$link.'';
              if($mail->Send())
                {
                  echo '<div class="alert alert-success">Check Your Email and Click on the link sent to your email</div>';
                }
              else
                {
                  echo "Mail Error - >".$mail->ErrorInfo;
                }
          }
          else
          {
            echo '<div class="warning">Sorry, Your entered email id not yet registered with us.</div>';
            echo '<div class="container">Want to register Now ? <a href="register.php">click here</a></div>';
          }
        }
      }
      else
    {
      $a = array();
      //$email = true;
      $a['email'] = "Email required";
     echo '<div class="warning">Valid Email-id is required.</div>';
    }
    }
    
    

    
    
?>

<div>
    <form class="form container forgotpwd" method="POST";>
    <label>Please Enter Your Registered Email Id :</label>
    <input class="<?php if(isset($a['email'])) : ?>input-error<?php endif; ?>" type="email" name="email" placeholder="abc@mail.com"></input>
    <button type="submit" name="submit">Submit</button>
    </form>
</div>

<?php include "footer.php"?>