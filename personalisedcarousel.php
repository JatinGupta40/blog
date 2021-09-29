<?php include 'header.php';
      include 'init.php'; 

$id = $_SESSION['id'];


if(isset($_POST['upload']))
{
    // Storing image with different name so that it will not have any naming problem with old images.
    if(empty($_POST['title']) && empty($_POST['author']) && empty($_POST['image']))
    {
?>
    <div class="warning"><?php echo"Fields Empty"; ?></div>
<?php
    }
    else
    {
      $title = ucfirst($_POST['title']);
      $author = ucfirst($_POST['author']);
      $var = rand(100,999);
      $var = md5($var);
      $fnm = $_FILES['image']['name'];        // uploaded file name.
      $var = $var.$fnm;
      $validext = array('png', 'jpeg', 'jpg');
      $imgname = @end(explode('.', $fnm));    // Fetching the file extension.
      $location = 'images/upload/'.$var;      // Location of folder in which the file gets stored.
      $locationdb = "images/upload/".$var;    // Location stored in db.
      if($imgname == $validext[0] || $imgname == $validext[1] || $imgname == $validext[2])  // Check the image format.
      {
        // Move file into the folder - image is the name of the filed we have taken
        if(move_uploaded_file($_FILES["image"]["tmp_name"],$location)) 
        {
          $run = $source->uploadimage($id, $locationdb, $title, $author);
          if($run)
          {
            header('location:uploadedimages.php');
          }
        }
        else
        {
          echo "File cannot be saved, please try again.";
        }
      }
      else
      {
?>
        <div class="warning"> <?php echo "Wrong format selected"; ?> </div>
<?php  
      }
    }
} 
// If ends here for submit button.



?>
    <div class="addblog">
        <h2><a href="uploadedimages.php">My Images</a></h2>
    </div>
    <hr>


<!-- Image Upload form -->
<div class="upload">
    <div class="carouselinputbox">
        <form method="POST" enctype="multipart/form-data">   
        <!-- enctype on the above line is used when the file is needed to be uploaded. It provides the file/files deatils -->
            <div class="field">
                <label>Title : </label>
                <input type ="text" name="title" placeholder="Title">
            </div>
            <div class="field">
                <label>Author : </label>
                <input type ="text" name="author" placeholder="Author">
            </div>
            <div class="field">
                <input type="file" id="image" name="image" src="/media/examples/login-button.png">
            </div>
            <div class="field">
                <button type="submit" class="" name="upload"> Submit </button>
            </div>
        </form>
    </div>
</div>







<?php include 'footer.php'; ?>