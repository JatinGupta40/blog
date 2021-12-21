<?php 

  // As multiple submit button doesn't work in single page. So we are transfering the page submit of index.php page for the language change part.
  // After executing this it will redirect to the index.php page again.
  $trimnameasprefix = strtolower(substr($_POST['lang'],0,2));
  setcookie('cookiename',$trimnameasprefix,time() + (86400 * 30), "/");
  header('location:/'. $trimnameasprefix. '/index');
 
?>