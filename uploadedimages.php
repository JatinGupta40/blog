<?php 

require_once ($_SERVER['DOCUMENT_ROOT'] .'/header.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/blog.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/carousel.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/user.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/method.php');
$blog = new blogQuery\blog;
$carousel = new carouselQuery\carousel;
$user = new userQuery\user;
$method = new methodQuery\method;
?>
<?php 
    // Logged-in user Id
    $id = $_SESSION['id'];  

    if(isset($_POST['submit']))
    {
      if(!empty($_POST['checkbox1'])) 
        {
          $check = $_POST['checkbox1'];
          foreach($check as $key => $value)
            {  
              // Fetching the details of image thats is checked/Selected.
              $tick = $check[$key];
              $res1  = $carousel->selectImage($tick);
              if($res1 -> num_rows > 0)
              {
                // Updating the value to true on selected image by the user.
                $sql = $carousel->updateImage($tick);
                header('location:index');
              }
              else
              {
                
              }
            }    
          }
        else
        {
  ?>
          <div class="warning"> <?php echo "Please select image first"; ?></div>
<?php
        }
    }
    elseif(isset($_POST['delete']))
    {
      if(!empty($_POST['checkbox1'])) 
        {
          $check = $_POST['checkbox1'];
          foreach($check as $key => $value)
            {  
              $tick = $check[$key];
              $res1 = $carousel->selectImage($tick);  // Fetching the details of image.
              if($res1 -> num_rows > 0)
              {
                $sql = $carousel->deleteImage($tick);  // Updating the value to true on selected image by the user.
              }
            }    
          }
        else
        {
  ?>
          <div class="warning"> <?php echo "Please select image first"; ?></div>
<?php
        }
    }
  
    // Fetching the images uploaded by the user.   
    $sql = "SELECT * from carousel WHERE userid = '$id' ORDER BY id DESC "; 
    $result = mysqli_query($conn,$sql);
    ?>
    <div class="uploadimageheading">
      <h2>Please Select the Images to be shown on your Carousel - </h2> 
    </div>
    <form action="" method="POST ">
    
<?php

    // For Displaying the Uploaded images of the user.
    if($result->num_rows > 0)
      {
        ?>
        <div class="container">
          <div class="row">
            <?php
        while ($row = mysqli_fetch_assoc($result))
          {
            $id = $row['id'];
            $userid = $row['userid'];
            $title = $row['title'];
            $imageby = $row['imageby'];
            $image=$row['image'];
            $checked = $row['checked'];
?>
        
            <div class="carouselbox col-md-6">
              <input type="checkbox" class="cardcheckbox" name="checkbox1[]"value="<?php echo $image ?>" <?php if($checked==1) :?> checked <?php endif; ?>  >  <!--  -->
              <img src = "<?php echo $image; ?>"></label></input>
              <div class="centered"><?php echo strtoupper($title);?></div>
              <div class="centered1"><?php echo strtoupper($imageby);?></div>
            </div>
        
<?php
            }
?>
  </div>
        </div>
          <div class="carouselbutton">
            <input type="submit" name="submit" value="Submit"></input>
            <input type="submit" name="delete" value="Delete"></input>
          </div>
          </form>
            <p id="show"> </p>
<?php
      }
    else
      {
        echo '<div class="  success" role="alert">
        <strong>There are no posts added</strong> .</div>';
      }
?>   



<?php include 'footer.php'; 