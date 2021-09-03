<?php include 'header.php';?> 

<?php 
    // Logged-in user Id
    $id = $_SESSION['id'];  
    
// Fetching the images uploaded by the user   
    $sql = "SELECT * from carousel WHERE userid = '$id' ORDER BY id DESC "; 
    $result = mysqli_query($conn,$sql);
    ?>
    <div class="uploadimageheading">
      <h2>Please Select the Images to be shown on your Carousel - </h2> 
    </div>
<?php
    if($result->num_rows > 0)
      {
        while ($row = mysqli_fetch_assoc($result))
          {
            $id = $row['id'];
            $userid = $row['userid'];
            $title = $row['title'];
            $imageby = $row['imageby'];
            $image=$row['image'];
?>
          <div class="box">
            <div class="carouselbox">
              <form action="" method="POST">
              <input type="checkbox" class="cardcheckbox" name="check" value="<?php echo $image; ?>"> 
              <img src = "<?php echo $image; ?>"></label></input>
              <div class="centered"><?php echo strtoupper($title);?></div>
              <div class="centered1"><?php echo strtoupper($imageby);?></div>
              </form>
            </div>
          </div>

          
<?php
            }
            ?>
          <div class="carouselbutton">
            <input type="submit" name="submit"></input>
          </div>
            <p class="show"> </p>
          
            <?php
        }
    else
      {
        echo '<div class="  success" role="alert">
        <strong>There are no posts added</strong> .</div>';
      }
      
     
    
?>   


<script>
    $('input:submit').on('click', function() {
        var array = [];
        $("input:checkbox[name=check]:checked").each(function() {
        //var a = true;  
          array.push($(this).val());
        });
        $('.show').text(array);
            
            // if(a==true)
            // {
            // $('#GFG_DOWN').text(array);
            // }
            // else
            // {
            //   $('#GFG_DOWN').text("None of the image is selected. ")
            // }
    });
</script>

<?php include 'footer.php'; 