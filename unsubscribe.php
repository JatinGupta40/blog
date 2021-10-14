<?php
    include ("header.php");
    include_once 'classes/user.php';
    include_once 'classes/method.php';
    include_once 'classes/newsletter.php';

    $user = new userQuery\user;
    $method = new methodQuery\method;
    $newsletter = new newsletterQuery\newsletter;

    $id = $_GET['id'];
    if($id)
    {
      $email = $newsletter->id($id);
      $email = mysqli_fetch_array($email);
      $email = $email['emailid'];
      $unsubscribe = $newsletter->updateunsubscribe($email);
    }
    else
    {
        echo '<div class="alert alert-success">Sorry, some error occurred. Please try again.</div>';
    }

?>

<div class="alert alert-success">You have successfully unsubscribed to the Newsletter.</div>