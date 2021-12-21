<?php 

require_once ($_SERVER['DOCUMENT_ROOT'] .'/header.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/blog.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/carousel.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/user.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/method.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/newsletter.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/language.php');

$blog = new blogQuery\blog;
$carousel = new carouselQuery\carousel;
$user = new userQuery\user;
$method = new methodQuery\method;
$newsletter = new newsletterQuery\newsletter;
$language = new languageQuery\language;

// Logic for Add Language Form.
if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $prefix = $_POST['prefix'];
    
    // Validation.
    if(!empty($_POST['name']))
    {
      $name = $_POST['name'];
    }
    else 
    {
      $name == null;
    }
    if(!empty($_POST['prefix']))
    {
      $prefix = $_POST['prefix'];
    }
    else 
    {
      $prefix == null;
    }
    
    $errors = array();
    if($name == null) 
    {
      $errors['name'] = 'Name is required.';
    }
    if($prefix == null) 
    {
      $errors['prefix'] = 'Prefix is required.';
    }
    
    // Adding into DB.
    if(!empty($name) && !empty($prefix))
    {
      // Checking if the entered language and prefix are already existed or not.
      $sql = $language->checkLang($name, $prefix);
      if($sql->num_rows > 0)
      {
        $errors['check'] = 'Language OR prefix already exists.';
      }
      else
      {
        $result = $language->addLang($name, $prefix);
        header('location:/', $_COOKIE['cookiename'],'/dashboard');
      }
    } 
    
    // Showing error if user forgot to enter any value.
    if (isset($errors)) {
        if (count($errors) > 0) {
          foreach ($errors as $key => $value) {
            echo '<div class="alert alert-danger">' . $value . '</div>';
            }
         }
      }
}
?>

<!-- Showing the available languages and feature to add language. -->
<div class="dashboardlanguagebg">
  <div class="container">
    <form method="POST">
      <label><u>Available Language: </u></label>
      <?php
        $lang = $language->allLang();
        while($row = $lang->fetch_assoc())
        {
          $prefix = $row['prefix'];
      ?>
          <ul><li><?php echo "- ",$row['Name'];?></li></ul>  
      <?php
        }
      ?>
      <div class="row">
        <div class="col-md-6 lang">
          <h5>Add Language : </h5>
          <input type="text" class="form-control <?php if ($errors['check']) : ?>input-error<?php endif; ?>" name = "name" value="<?php if ($errors['name']) { echo $name; } ?>" placeholder = "Language Name"></input>
          <input type="text" class="form-control <?php if ($errors['check']) : ?>input-error<?php endif; ?>" name = "prefix" value="<?php if ($errors['prefix']) { echo $prefix; } ?>" placeholder = "Prefix"></input>
          <button name="submit" class="btn btn-primary btn-lg">SUBMIT</button> 
        </div>
        <div class="col-md-6">
          <select class="" id="myselection">
            <option value="1">First</option>
            <option value="2">Second</option>
          </select>
          <button id="submitselect">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>


    <script>
        $(document).ready(function() {
            $("#submitselect").click(function() {
                alert($("#myselection").val());
            });
        });
    </script>

<?php
  include('footer.php');
?>