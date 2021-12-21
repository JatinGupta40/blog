<?php
    
  require_once ($_SERVER['DOCUMENT_ROOT'] .'/header.php');
  require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/blog.php');
  require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/method.php');
  require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/newsletter.php');
  require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/language.php');

    $blog = new blogQuery\blog;
    $user = new userQuery\user;
    $method = new methodQuery\method;
    $newsletter = new newsletterQuery\newsletter;
    $language = new languageQuery\language;

    $a = $_SESSION['fname'];
    $id = $_SESSION['id'];
   
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    // From Validation 
    
    
    if(isset($_POST['submit']))
    {
      $heading = $_POST['heading'];
      $content = $_POST['content'];
 
      // Heading.
      if(!empty($_POST['heading']))
      {
        $heading = $_POST['heading'];
      }
      else 
      {
        $heading == null;
      }
      // Content.
      if(!empty($_POST['content']))
      {
        $content = $_POST['content']; 
      }
      else 
      {
        $content == null;
      }
      // Clean Url.
      if(!empty($_POST['cleanurl']))
      {
        $cleanurl = $_POST['cleanurl']; 
      }
      else 
      {
        $cleanurl == null;
      }
      

      $errors = array();
      if($heading == null) 
      {
        $errors['heading'] = 'Heading is required.';
      }
      if($content == null) 
      {
        $errors['content'] = 'Content is required.';
      }


      if(!empty($_POST['heading']) && !empty($_POST['content']))
      {
        // Inserting into DB.
        echo $heading," ", $content," ", $id;
        $result = $blog->insertBlog($id, $language, $heading, $content, $cleanurl);
        // Send mail to the subscribed user.
        $subscribe = $newsletter->mail();
        // Fetching the id for this new uploaded blog.
        $query = $blog->blog();
        if($query->num_rows > 0)
        {
          // Here, fetch function is called from method class.
          $row = $method->fetchArray($query);
          $id = $row['id'];
        } 
        // For Newsletter, each time any post is added, the subscribed users will get email for that.
        while($email = $method->fetchAssoc($subscribe))
        { 
          $userid = $email['id'];
          $link = "<a href='https://localhost/blogging/article.php?Heading=".$heading."&id=".$id."'>New Post</a>";
          $unsubscribe = "<a href='https://localhost/blogging/unsubscribe.php?id=".$userid."'>Unsubscribe</a>";
          require 'vendor/autoload.php';
          $mail = new PHPMailer();
          $mail->CharSet = "utf-8";
          $mail->IsSMTP();
          $mail->SMTPAuth = true;                  
          // GMAIL username.
          $mail->Username = "autoarenacar@gmail.com";
          // GMAIL password.
          $mail->Password = "jatinguptacute8800";
          $mail->SMTPSecure = "ssl";  
          // Sets GMAIL as the SMTP server
          $mail->Host = "smtp.gmail.com";
          // Set the SMTP port for the GMAIL server
          $mail->Port = "465";
          $mail->From='gupta.jatin40@gmail.com';
          $mail->FromName='Jatin Gupta';
          $mail->AddAddress($email['emailid']);
          $mail->Subject  =  'NEW POST';
          $mail->IsHTML(true);
          $mail->Body = 'Click On This Link to Reset Password '.$link.'. '.$unsubscribe.'';
          
          $mail->Send();
        }
       // header('location:/blogslogin');
      }
      // Displaying Error message.
      if (isset($errors)) {
        if (count($errors) > 0) {
          foreach ($errors as $key => $value) {
            echo '<div class="alert alert-danger">' . $value . '</div>';
            }
         }
      }
      
        
    }
?>
    
    <div class="container languageoption">
      <h5>Now you can add your Blog in different languages also - </h5>
      <?php 
        $lang = $language->allLang();
        while($row = $lang->fetch_assoc())
        {
          $prefix = $row['prefix'];
      ?>
          <ul><li><a href="/addblog/<?php echo $prefix ?>"><?php echo "- ",$row['Name'];?></a></li></ul>  
      <?php
        }
      ?>
    </div>

<div class="container d-flex align-items-center createblog">
  <form method="POST" style="width:50%">
    <h3 class="form-caption">Add Article</h3>
    <hr>
    <div class="form-group">
      <label>Title/Heading</label>
      <input type="title" name="heading" class="form-control <?php if(isset($errors['heading'])) : ?> input-error<?php endif ; ?>" value="<?php if (isset($_POST['heading'])) { echo $heading; } ?>">
    </div>
    <div class="form-group">
      <label for="">Content</label>
      <textarea type="content" name="content" rows="8" class="form-control <?php if(isset($errors['heading'])) : ?> input-error<?php endif ; ?>" value="<?php if (isset($_POST['content'])) { echo $content; } ?>"></textarea>
    </div>
    <div class="form-group">
      <label>Custom Clean URL :</label>
      <input type="text" name="cleanurl" class="form-control blogcommentbox" value="<?php echo $cleanurl ?>" placeholder="Clean Url"> 
    </div>  
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<?php include 'footer.php' ?>