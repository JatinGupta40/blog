<?php 

require_once ($_SERVER['DOCUMENT_ROOT'] .'/header.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/blog.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/method.php');
require_once ($_SERVER['DOCUMENT_ROOT'] .'/classes/language.php');

$blog = new blogQuery\blog;
$method = new methodQuery\method;
$language = new languageQuery\language;

  // Getting id of blog.
  $id = $_GET['id']; 
  echo $cookiename;
?>


<div class="container languageoption">
      <h5>Now you can add your Blog in different languages also - </h5>
      <?php 
        $lang = $language->allLang();
        while($row = $lang->fetch_assoc())
        {
          $prefix = $row['prefix'];
      ?>
          <ul><li><a href="<?php echo $_COOKIE['cookiename']; ?>/createblog?id=<?php echo $id;?>&lang=<?php echo $prefix ?>"><?php echo "- ",$row['Name'];?></a></li></ul>  
      <?php
        }
      ?>
    </div>
  
  <!-- Blogs content start. -->
  <div class="container">
    <div class="row">
      <div class="col-md-8">
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
        <div dir="<?php echo $rtl;?>" class="blogbox">
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
      </div>
    </div>
  </div>
      
   
  <!-- Blogs content END -->
  <div class="blogcommentsection">
    <form action="">
      <p>
        <b>
          <i>Please provide Your valuable Comments : </i>
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
     
<?php
 
?>
<?php include 'footer.php';?>