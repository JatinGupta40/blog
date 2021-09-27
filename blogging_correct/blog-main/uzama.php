<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
?>
<?php
if(isset($_POST['password-reset-token']) && $_POST['email'])
{
    include('conec.php');
    $emailId = $_POST['email'];
    $result = mysqli_query($con,"SELECT * FROM user_registration WHERE email='" . $emailId . "'");
    $row= mysqli_fetch_array($result);
  if($row)
  {
     $token = md5($emailId).rand(10,9999);
     date_default_timezone_set("Asia/Calcutta");
     $expFormat = mktime(
     date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
     );
    $expDate = date("Y-m-d H:i:s",$expFormat);
    $update = mysqli_query($con,"UPDATE user_registration set reset_link_token='" . $token . "' ,exp_date='" . $expDate . "' WHERE email='" . $emailId . "'");
    $link = "<a href='http://localhost/QED/reset-password.php?key=".$emailId."&token=".$token."'>Click To Reset password</a>";
    require 'vendor/autoload.php';
   // require_once('phpmail/PHPMailerAutoload.php');
    $mail = new PHPMailer();
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;                  
    // GMAIL username
    $mail->Username = "uzmasangolli1998@gmail.com";
    // GMAIL password
    $mail->Password = "#temporarypassword";
    $mail->SMTPSecure = "ssl";  
    // sets GMAIL as the SMTP server
    $mail->Host = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
    $mail->Port = "465";
    $mail->From='uzmasangolli1998@gmail.com';
    $mail->FromName='uzama';
    $mail->AddAddress($emailId, 'user');
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    = 'Click On This Link to Reset Password '.$link.'';
    if($mail->Send())
    { 
      ?> 
      <div class="container"><?php echo "Check Your Email and Click on the link sent to your email";?></div>
      <?php
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
  }else{
    echo "Invalid Email Address. Go back";
  }
}
?>