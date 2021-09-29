<?php 
include './header.php';
include ("init.php");

  // Getting id of blog.
  $id = $_GET['id']; 

?>

  <!-- Blogs content start. -->
  <div class="blogbox">
  <?php 
    // Getting field DB table.     
    $result = $source->blogbyid($id);
    {
      if($result->num_rows > 0)
      {
        // Fetching details from blog table with respect to blog-id.
        while ($row = $method->fetch($result))
        {
          $id = $row['id'];
          $title = $row['Heading'];
          $content = $row['content'];
          $logo = $row['image'];
        }
      }
    }
  ?>
    <h2>Analytics</h2 >
    <img class="blogimage"  src="images/<?php echo $logo; ?>" alt="image" >
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