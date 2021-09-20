<?php include 'header.php';
include 'connection.php'?>
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
              $sql1 = "select * from `carousel` where image = '$check[$key]'";  // fetching the details of image
              $res1 = mysqli_query($conn,$sql1);
              if($res1 -> num_rows > 0)
              {
                $sql = "UPDATE carousel SET checked = TRUE  WHERE image = '$check[$key]'";  // updating the value to true on selected image by the user.
                $res = mysqli_query($conn,$sql);
                header('location:index.php');
                //print_r($res);
                //echo "success true";
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
      echo "as";
      if(!empty($_POST['checkbox1'])) 
        {
          $check = $_POST['checkbox1'];
          foreach($check as $key => $value)
            {  
              $sql1 = "select * from `carousel` where image = '$check[$key]'";  // fetching the details of image
              $res1 = mysqli_query($conn,$sql1);
              if($res1 -> num_rows > 0)
              {
                $sql = "DELETE FROM `carousel` WHERE image = '$check[$key]'";  // updating the value to true on selected image by the user.
                $res = mysqli_query($conn,$sql);
                print_r($res);
                //echo "success true";
              }
            }    
          }
        else
        {
  ?>
          <div class="warning"> <?php echo "Please select image first"; ?></div>
<?php
        }//print_r($check[$key]);
    }
  
// Fetching the images uploaded by the user   
    $sql = "SELECT * from carousel WHERE userid = '$id' ORDER BY id DESC "; 
    $result = mysqli_query($conn,$sql);
    ?>
    <div class="uploadimageheading">
      <h2>Please Select the Images to be shown on your Carousel - </h2> 
    </div>
    <form action="" method="POST">
    
<?php

    // For Displaying the Uploaded images of the user
    if($result->num_rows > 0)
      {
        while ($row = mysqli_fetch_assoc($result))
          {
            $id = $row['id'];
            $userid = $row['userid'];
            $title = $row['title'];
            $imageby = $row['imageby'];
            $image=$row['image'];
            $checked = $row['checked'];
?>
          <div class="box">
            <div class="carouselbox">
              
              <input type="checkbox" class="cardcheckbox" name="checkbox1[]"value="<?php echo $image ?>" <?php if($checked==1) :?> checked <?php endif; ?>  >  <!--  -->
              <img src = "<?php echo $image; ?>"></label></input>
              <div class="centered"><?php echo strtoupper($title);?></div>
              <div class="centered1"><?php echo strtoupper($imageby);?></div>
            </div>
          </div>
<?php
            }
?>
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

<!-- <script>
    $('input:submit').on('click', function() {
        var array = [];
        $("input:checkbox[name=checkbox]:checked").each(function() {
          
          array.push($(this).val());
        });
        $('#show').text(array);
        
    });
</script> -->

<?php include 'footer.php'; 