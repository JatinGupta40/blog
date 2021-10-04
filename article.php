<?php 
include './header.php';

include_once 'classes/blog.php';
include_once 'classes/carousel.php';
include_once 'classes/user.php';
include_once 'classes/method.php';
$blog = new blogQuery\blog;
$carousel = new carouselQuery\carousel;
$user = new userQuery\user;
$method = new methodQuery\method;

  // Getting id of blog.
  $id = $_GET['id']; 

?>

  <!-- Blogs content start. -->
  <div class="blogbox">
  <?php 
    // Getting field DB table.     
    $result = $blog->blogById($id);
    {
      if($result->num_rows > 0)
      {
        // Fetching details from blog table with respect to blog-id.
        while ($row = $method->fetchArray($result))
        {
          $id = $row['id'];
          $title = $row['Heading'];
          $content = $row['content'];
          $logo = $row['image'];
        }
      }
    }
  ?>
    <h2><?php echo $title; ?></h2>
    <?php
      // Checking if the user has uploaded any image or not.
      if ($logo == "")
      {

      }
      else 
      {
    ?>
        <img class="blogimage"  src="images/<?php echo $logo; ?>" alt="image" >
    <?php
      }
    ?>
    <p><?php echo $content;?></p>
  </div>
   
  <!-- Blogs content END -->
  <div class="blogcommentsection">
    <form action="">
      <p>
        <b>
          <i>Please provide Your valuable Comments - </i>
        </b>
      </p>
      <textarea class="blogcommentbox" id="comments" name=""></textarea>
      <br>
      <button type="button" class="btn btn-primary"  onclick="thankyou()" value="Submit">SUBMIT</button>
      <i>
        <p id="ty"></p>
      </i>
    </form>
  </div>
  
<main id="main"></main>

<!-- End #main -->
<div style="margin-top:50px;"></div>
<script>
  function thankyou()
  {
    document.getElementById("ty").innerHTML = "Thank You for your Valuable comment";
  }
   
  var x = window.location.href;
  document.getElementById("demo").innerHTML = "The full URL of this page is:<br>" + x;
  document.write(x)
</script>      

<?php include 'footer.php';?>